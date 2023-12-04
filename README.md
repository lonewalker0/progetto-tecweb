# TECNOLUM Festival

## Installation

Per usarlo posizionarsi nella stessa cartella contentente il file docker-compose e lanciare da terminale:
```bash
$ docker-compose up -d 
```
Per fermare il container digitare
```bash
$ docker-compose stop
```
Per rimuovere il container ma lasciando i volumi:
```bash
$ docker-compose down
```
Per vedere i log del container
```bash
$ docker-compose logs
```

## Usage

Una volta avviato il docker, andare su localhost:8080 

I file html andranno inseriti nell'apposita cartella html e così per gli altri 

Se si vogliono effettuare modifiche ai files bisogna creare un nuovo branch, connettendolo alle relative issue.

Una volta apportate le modifiche, si apre la pull request, se si vuole continuare a modificare la si apre in modalità draft.

Per effettuare il merge bisogna che le modifiche vengano approvate e risolte eventuali conversazioni.

## Troubleshooting

In caso docker non dovesse partire con docker-compose up, verificate che non ci siano servizi che usino la stessa porta o che il container sia ancora attivo in background.

da terminale, nella stessa directory del docker compose :

```bash
docker ps
```

con questo comando vedete i container attivi e su quali porte lavorano.

trovato il container colpevole, copiare il nome, si trova nella prima colonna
```bash
docker stop nome_container
```
per stoppare il container 

```bash
docker-compose up
```
tutto dovrebbe ripartire
