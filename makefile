.PHONY: generate-key build scale run stop clean

generate-key:
	@if [ ! -f ./website/.env ]; then \
		echo "Generazione della APP_KEY in corso..."; \
		KEY=$$(openssl rand -base64 32); \
		cp ./website/.env.example ./website/.env; \
		sed -i.bak '/^APP_KEY=/d' ./website/.env && rm -f ./website/.env.bak; \
		echo "APP_KEY=base64:$$KEY" >> ./website/.env; \
		echo "APP_KEY generata e salvata nel file .env!"; \
	fi

build: generate-key
	@echo "Creazione dei container in corso..."
	docker compose build
	docker compose up --no-start

run:
	docker compose start

stop:
	docker compose stop

clean:
	docker compose down --rmi all -v --remove-orphans

scale:
	@if [ -z "$(n)" ]; then \
		echo "Errore: Devi specificare il numero di container. Esempio: make scale n=3"; \
		exit 1; \
	fi
	@echo "Scalo il servizio 'app' a $(n) istanze..."
	docker compose up -d --scale app=$(n)