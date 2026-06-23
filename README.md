# Caerus - Ambiente Docker e Livello di Observability

Questo repository contiene l'ambiente Docker scalabile per l'applicazione Laravel "Caerus", sviluppata nell'ambito del corso di Amministrazione di Sistema. L'infrastruttura è progettata per essere scalabile orizzontalmente, con persistenza delle sessioni su più container e un livello di Observability basato sulla metodologia SRE (metodo RED, log strutturati, error tracking).

## Architettura

L'ambiente è composto dai seguenti servizi:

* **Nginx (`web`)**: web server e load balancer. Riceve le richieste sulla porta 8000 e le distribuisce in round-robin ai container PHP.
* **PHP-FPM (`app`)**: container che eseguono il codice Laravel applicativo. Possono essere scalati orizzontalmente.
* **MySQL (`db`)**: database relazionale.
* **Redis (`sessions-handler`)**: utilizzato per centralizzare sessioni e cache, ed è anche lo store delle metriche RED aggregate.
* **Prometheus (`prometheus`)**: raccoglie periodicamente le metriche RED esposte dall'applicazione sull'endpoint `/metrics`.
* **Grafana (`grafana`)**: interfaccia di visualizzazione delle metriche, configurata automaticamente all'avvio tramite provisioning.

## Prerequisiti

* Docker
* Docker Compose
* Git

## Installazione

Procedura per avviare il progetto dopo averlo clonato su un nuovo computer.

**1. Clonazione del repository:**
```bash
git clone https://github.com/WildPlayer05/caerus-fas-project.git
cd caerus
```

**2. Configurazione di APP_KEY:**
Affinché il load balancer e la gestione delle sessioni funzionino correttamente, tutti i container dell'applicazione devono condividere la stessa `APP_KEY`. Aprire `docker-compose.yaml`, individuare il servizio `app` e inserire una chiave valida sotto `environment`:

```yaml
  app:
    environment:
      APP_KEY: "base64:INSERIRE_QUI_LA_CHIAVE="
      # altre variabili
```

**3. Avvio dei container:**
```bash
docker-compose up -d --build --scale app=3
```
Docker inietta automaticamente APP_KEY e le credenziali del database in tutti i container dell'applicazione.

**4. Inizializzazione del database:**
```bash
docker-compose exec app php artisan migrate
```
Non necessario nella configurazione corrente, in quanto viene ripristinato automaticamente un database di prova.

L'applicazione è raggiungibile all'indirizzo: http://localhost:8000

## Observability

Il progetto implementa un livello di Observability secondo la metodologia SRE: metodo RED (Rate, Errors, Duration), Lossy Summaries, percentili P95/P99, log strutturati in formato JSON ed error tracking.

### Log strutturati in JSON

Ogni richiesta produce una riga di log in formato JSON sul canale dedicato `observability` (`storage/logs/observability.log`), contenente un identificativo di correlazione (`request_id`, propagato anche nell'header di risposta `X-Request-Id`), metodo HTTP, route, codice di stato, durata, indirizzo IP e container che ha servito la richiesta.

### Metodo RED e Lossy Summaries

Ogni richiesta HTTP attraversa `ObservabilityMiddleware`, che misura Rate, Errors e Duration e aggrega il risultato in Redis tramite la classe `RedMetricsCollector`. L'aggregazione segue il pattern delle Lossy Summaries: nessun dato puntuale della singola richiesta viene conservato, solo contatori e bucket di istogramma, garantendo memoria costante indipendentemente dal volume di traffico. I percentili P95 e P99 sono stimati per interpolazione lineare sui bucket, analogamente alla funzione `histogram_quantile` di Prometheus.

Le metriche sono condivise tra tutti i container `app` tramite lo store comune su Redis, risultando quindi coerenti indipendentemente da quale istanza abbia servito ciascuna richiesta.

### Distribuzione del carico tra i container

Ogni risposta include un header `X-Served-By` con l'hostname del container PHP-FPM che ha gestito la richiesta, utile per verificare che Nginx distribuisca correttamente il traffico in round-robin tra le repliche. La medesima informazione è disponibile anche come metrica aggregata (`http_requests_by_container_total`), per individuare eventuali squilibri di carico e supportare le decisioni relative allo scaling orizzontale.

### Endpoint /metrics e dashboard Grafana

L'applicazione espone l'endpoint `/metrics` in formato testuale compatibile con Prometheus. Prometheus effettua lo scrape di tale endpoint ogni 15 secondi; Grafana è preconfigurato con un datasource Prometheus e una dashboard, disponibile senza necessità di configurazione manuale.

* Prometheus: http://localhost:9090
* Grafana: http://localhost:3000 (credenziali: admin / admin)

### Error tracking

Le eccezioni non gestite vengono inviate automaticamente a Sentry tramite il package `sentry/sentry-laravel`, con raccolta di stack trace, contesto della richiesta e raggruppamento/deduplicazione automatica degli errori ripetuti. In assenza della variabile `SENTRY_LARAVEL_DSN`, l'integrazione resta inattiva.

## Variabili d'ambiente

In virtù dell'architettura basata su Docker, non è necessario configurare file `.env` locali per i parametri vitali (database, Redis, APP_KEY, Sentry). Tali variabili sono gestite centralmente dal file `docker-compose.yaml` e iniettate a livello di sistema operativo nei container, sovrascrivendo eventuali configurazioni locali di Laravel. Questo garantisce che l'applicazione possa scalare senza disallineamenti tra i container.


## Comandi utili

Fermare tutti i container:
```bash
docker-compose down
```

Visualizzare i log in tempo reale:
```bash
docker-compose logs -f
```

Scalare l'applicazione senza interrompere il servizio:
```bash
docker-compose up -d --scale app=5
```

Verificare l'integrazione con Sentry:
```bash
docker-compose exec app php artisan sentry:test
```
