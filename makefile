.PHONY: generate-key build run

generate-key:
	@echo "Generazione della APP_KEY in corso..."
	$(eval KEY := $(shell openssl rand -base64 32))
	@cp ./website/.env.example ./website/.env
	@sed -i.bak '/^APP_KEY=/d' ./website/.env && rm -f ./website/.env.bak
	@echo "APP_KEY=base64:$(KEY)" >> ./website/.env
	@echo "APP_KEY generata e salvata nel file .env!"

build: generate-key
	docker-compose up -d --scale app=3