***

# 🚀 Caerus - Laravel Docker Environment

Questo repository contiene l'ambiente Docker scalabile per l'applicazione Laravel "Caerus". L'infrastruttura è progettata per essere pronta alla produzione, supportando il Load Balancing e la persistenza delle sessioni su più container.

## 🏗 Architettura

L'ambiente è composto dai seguenti servizi:
* **Nginx (`web`)**: Web server e **Load Balancer**. Riceve le richieste sulla porta 8000 e le distribuisce in Round-Robin ai container PHP.
* **PHP-FPM (`app`)**: I container che eseguono il codice Laravel. Possono essere scalati orizzontalmente.
* **MySQL (`db`)**: Database relazionale.
* **Redis (`sessions-handler`)**: Utilizzato per centralizzare le **Sessioni** e la **Cache**. Fondamentale per evitare errori *419 Page Expired* dietro il Load Balancer.

---

## 🛠 Prerequisiti
* Docker
* Docker Compose
* Git

---

## 🚀 Quick Start (Installazione da zero)

Segui questi passaggi per avviare il progetto dopo averlo clonato su un nuovo computer:

**1. Clona il repository e posizionati nella cartella:**
```bash
git clone https://github.com/WildPlayer05/caerus-fas-project.git
cd caerus
```

**2. Configura l'APP_KEY nel Docker Compose:**
Affinché il Load Balancer e le sessioni funzionino correttamente, **TUTTI i container dell'applicazione devono condividere la stessa identica `APP_KEY`**. 
Apri il file `docker-compose.yml`, cerca il servizio `app` e inserisci una chiave valida sotto la voce `environment` (puoi copiare quella di un vecchio progetto o generarne una):

```yaml
  app:
    environment:
      APP_KEY: "base64:INSERISCI_QUI_LA_TUA_CHIAVE="
      # ... altre variabili
```

**3. Avvia i container Docker:**
Avviamo l'infrastruttura creando, ad esempio, 3 container per l'applicazione PHP:
```bash
docker-compose up -d --build --scale app=3
```
*(Nota: Docker inietterà automaticamente l'APP_KEY e le credenziali del Database a tutti e 3 i container).*

**4. Inizializza il Database:**
Lancia le migrazioni per creare le tabelle:
```bash
docker-compose exec app php artisan migrate
```
*(Nota: Attualmente non necessario in quanto viene ripristinato automaticamente un database di prova).*

🎉 **Fatto! L'applicazione è ora raggiungibile all'indirizzo: [http://localhost:8000](http://localhost:8000)**

---

## ⚙️ Variabili d'Ambiente (Twelve-Factor App)

Grazie all'architettura basata su Docker, **non è necessario** configurare file `.env` locali per i parametri vitali (Database, Redis, APP_KEY). 

Queste variabili vengono gestite centralmente dal file `docker-compose.yml` e iniettate a livello di sistema operativo nei container, sovrascrivendo qualsiasi configurazione locale di Laravel. Questo garantisce che l'applicazione possa scalare senza problemi di desincronizzazione tra i container.

---

## 🖥 Comandi Utili

**Fermare tutti i container:**
```bash
docker-compose down
```

**Leggere i log in tempo reale:**
```bash
docker-compose logs -f
```

**Eseguire comandi Artisan (es. svuotare la cache):**
```bash
docker-compose exec app php artisan optimize:clear
```

**Scalare l'applicazione a caldo (senza spegnere il server):**
```bash
docker-compose up -d --scale app=5
```