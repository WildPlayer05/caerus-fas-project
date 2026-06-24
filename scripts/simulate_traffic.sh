#!/usr/bin/env bash
set -uo pipefail

BASE_URL="${BASE_URL:-http://localhost:8000}"
ITERATIONS="${ITERATIONS:-50}"
SLEEP_MIN="${SLEEP_MIN:-0}"
SLEEP_MAX="${SLEEP_MAX:-0.1}"
CONCURRENCY="${CONCURRENCY:-10}"

PUBLIC_PAGES=("/" "/product" "/aboutus" "/joinus" "/ourvision" "/websitemap" "/chart")

KNOWN_USER_EMAIL="private@gmail.com"
KNOWN_USER_PASSWORD="12345678"

extract_token() {
    grep -oP 'name="_token"\s+value="\K[^"]+' <<< "$1" | head -n1
}

random_string() {
    local len="$1"
    tr -dc 'A-Z0-9' < /dev/urandom | head -c "$len"
}

random_email() {
    echo "sim$(date +%s%N)$RANDOM@example.com"
}

random_phone() {
    echo "3$(tr -dc '0-9' < /dev/urandom | head -c 9)"
}

random_sleep() {
    awk -v min="$SLEEP_MIN" -v max="$SLEEP_MAX" 'BEGIN { srand(); printf "%.2f", min + rand() * (max - min) }'
}

browse_public_page() {
    local jar="$1"
    local page="${PUBLIC_PAGES[$RANDOM % ${#PUBLIC_PAGES[@]}]}"
    curl -s -b "$jar" -c "$jar" -o /dev/null -w "GET %{url_effective} -> %{http_code}\n" "${BASE_URL}${page}"
}

do_signup() {
    local jar="$1"
    local page
    page=$(curl -s -b "$jar" -c "$jar" "${BASE_URL}/user/signup")
    local token
    token=$(extract_token "$page")

    if [[ -z "$token" ]]; then
        echo "signup: impossibile estrarre il CSRF token, salto"
        return
    fi

    local email
    email=$(random_email)

    curl -s -b "$jar" -c "$jar" -o /dev/null -w "POST /user/signup/private (${email}) -> %{http_code}\n" \
        -X POST "${BASE_URL}/user/signup/private" \
        --data-urlencode "_token=${token}" \
        --data-urlencode "name=Sim" \
        --data-urlencode "surname=User" \
        --data-urlencode "email=${email}" \
        --data-urlencode "phoneNumber=$(random_phone)" \
        --data-urlencode "CF=$(random_string 16)" \
        --data-urlencode "password=12345678"
}

do_login() {
    local jar="$1"
    local page
    page=$(curl -s -b "$jar" -c "$jar" "${BASE_URL}/user/login")
    local token
    token=$(extract_token "$page")

    if [[ -z "$token" ]]; then
        echo "login: impossibile estrarre il CSRF token, salto"
        return
    fi

    curl -s -b "$jar" -c "$jar" -o /dev/null -w "POST /user/login -> %{http_code}\n" \
        -X POST "${BASE_URL}/user/login" \
        --data-urlencode "_token=${token}" \
        --data-urlencode "email=${KNOWN_USER_EMAIL}" \
        --data-urlencode "password=${KNOWN_USER_PASSWORD}"

    curl -s -b "$jar" -c "$jar" -o /dev/null -w "GET /user/dashboard -> %{http_code}\n" \
        "${BASE_URL}/user/dashboard"
}

do_failed_login() {
    local jar="$1"
    local page
    page=$(curl -s -b "$jar" -c "$jar" "${BASE_URL}/user/login")
    local token
    token=$(extract_token "$page")

    curl -s -b "$jar" -c "$jar" -o /dev/null -w "POST /user/login (credenziali errate) -> %{http_code}\n" \
        -X POST "${BASE_URL}/user/login" \
        --data-urlencode "_token=${token}" \
        --data-urlencode "email=nonexistent@example.com" \
        --data-urlencode "password=wrongpassword"
}

do_trigger_error() {
    local jar="$1"
    do_login "$jar" > /dev/null

    curl -s -b "$jar" -c "$jar" -o /dev/null -w "GET /user/contract/invoice/999999 (errore atteso) -> %{http_code}\n" \
        "${BASE_URL}/user/contract/invoice/999999"
}

worker() {
    local worker_id="$1"
    local jar
    jar=$(mktemp)

    for ((i = 1; i <= ITERATIONS; i++)); do
        local roll=$((RANDOM % 100))

        if ((roll < 55)); then
            browse_public_page "$jar"
        elif ((roll < 70)); then
            do_login "$jar"
        elif ((roll < 80)); then
            do_signup "$jar"
        elif ((roll < 92)); then
            do_failed_login "$jar"
        else
            do_trigger_error "$jar"
        fi

        if (( $(awk -v m="$SLEEP_MAX" 'BEGIN { print (m > 0) }') )); then
            sleep "$(random_sleep)"
        fi
    done

    rm -f "$jar"
}

main() {
    echo "Simulazione traffico su ${BASE_URL}: ${CONCURRENCY} worker x ${ITERATIONS} iterazioni ciascuno"

    local pids=()
    for ((w = 1; w <= CONCURRENCY; w++)); do
        worker "$w" &
        pids+=($!)
    done

    wait "${pids[@]}"

    echo "Simulazione completata."
}

main
