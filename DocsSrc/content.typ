= Introduzione

Per il progetto didattico del corso di Tecnologie Web, nell'Anno Accademico 2023-2024, il nostro gruppo si è dedicato alla realizzazione di un sito per un ipotetico Festival musicale chiamato TechnoLum250Festival. 

= Analisi dei requisiti

== Target di Utenza
Il suddetto festival si rivolge principalmente a un pubblico giovane, la cui età spazia tra i 16 e i 35 anni, attirati da generi musicali quali hip-hop, R&B e musica elettronica.
Il sito sviluppato deve di conseguenza rivolgersi principalmente a queste categorie di utenti,
La demografia rilevata, apprezza un'interfaccia utente intuitiva, design accattivante e facilmente navigabile da dispositivi mobili, riflettendo il loro stile di vita dinamico.
Sebbene il sito web sia da sviluppare in modo tale da strizzare l'occhio ad un pubblico giovane e costantemente al passo con la tecnologia, è fondamentale che il design non escluda fasce d'età più mature.
Di conseguenza è necessario che il sito offra un'esperienza utente accessibile a un utente più anziano, che potrebbe essere interessato a esplorare e partecipare all'evento.
Più in generale, il contesto in oggetto si propone di essere un punto di incontro per l'intera comunità, di conseguenza In linea con questo presupposto di inclusione, è fondamentale che il sito web sia pienamente accessibile alle persone con disabilità, e garantire loro una navigazione piacevole e chiara. 

== Tipi di utenti e funzionalità


Il gruppo già in fase di analisi ha stabilito che non si sarebbero implementate una serie di funzionalità che, in ottica di un reale utilizzo, sarebbero ideali. 
Per esempio la possibilità di avere delle prevendite nominative, la possibilità di refound delle stesse oppure la possibilità per l'amministratore di visualizzare l'andamento delle vendite.
Questo è dovuto principalmente alle limitazioni di tempo e risorse tipiche di un progetto accademico.
Ci si è infatti posti l'obbiettivo di realizzare funzionalità diversificate, in modo tale da poter esplorare a pieno le possibilità offerte dai linguaggi utilizzati. 
Successivamente sono presentate le categorie di utenti e le funzionalità che il team ha individuato in sede di analisi. 

=== Visitatori Standart: 
Questa categoria deve poter aver accesso a tutte le informazioni generali riguardanti il festival: in particolare deve poter esplorare la lineup degli artisti, visualizzare le FAQ, avere una preview del merch disponibile in Loco. Inoltre deve poter effettuare la registrazione. 

=== Utenti Registrati:
Tali utenti, oltre a tutte le possibilità offerte al visitatore Standard, devono poter aggiornare i propri dati personali, poter cambiare la password, acquistare prevendite e visualizzare i dettagli degli acquisti sotto forma tabellare. Inoltre hanno la possibilità di eliminare definitivamente l'account dal sito web.

=== Admin: 
L'admin ha inoltre la possibilità di modificare la lineup del festival inserendo ed eliminando gli eventi.  
Tali eventi sono caratterizzati univocamente dal perfomer, da una sua foto, da una data e un orario e infine, da una descrizione.

= Progettazione 

== Wireframe e mockup
Prima di avviare lo sviluppo, abbiamo adottato una metodologia di progettazione che includeva la creazione di wireframe e mockup.
L'attività è stata fondamentale: abbiamo infatti potuto circonscrivere meglio i requisiti e inoltre ci ha portato a ragionare subito sulle possibili implementazioni.
Inoltre ci ha permesso di definire un idea comune di quello che saremmo andati a realizzare. 
In questa sede abbiamo inoltre avuto modo di approfondire il tema in oggetto, analizzando le caratteristiche presenti in siti simili. 
I disegni realizzati si sono concentrati sulla logica della disposizione degli elementi, sulla navigazione e sulla gerarchia degli elementi, lasciando da parte dettagli grafici. 
In incontri successivi, a seguito dell'individuazione di una prima palette di colori, abbiamo specializzato il dettaglio di quei disegni, senza però entrare troppo nello specifico. 
Questo processo preparatorio è risultato molto utile per scolpire un primo aspetto, prima di entrare nella fase di sviluppo.

== Convenzioni adottate
Si riportano di seguito le convenzioni adottate dal gruppo: 
=== Link
Il team ha deciso di mantenere i link sottolineati come da Standart WACG, inoltre per ridurre il disorientamento cognitivo si è optato per mantenere un colore diverso per i link visitati. 
I colori individuati sono stati il bianco e il giallo rispettivamente per i link visitati e non visitati. 
=== Logo cliccabile
Il team ha scelto di addottare la pratica ormai quasi universale nel web design di associare al logo un link cliccabile che riporto alla pagina home. Tramite espressioni regolari si è garantita l'eliminazione dei link circolari. 
=== Breadcrumbs
Abbiamo abbracciato la convenzione di addottare una breadcrumbs per favorire la navigazione, e limitare il sovraccarico cognitivo per l'utente.

== Pagine
Si riporta una breve descrizione delle pagine implementate e disponibili alle varie categorie di utenti 

=== Area comune 
 - *Home*: pagina principale del sito e la prima visualizzata quando si accede al sito. Incorpora un carosello scorrevole in modo dinamico in cui vengono mostrate varie foto del Festival. Per ogni giornata del festival vengono mostrati gli artisti che si esibiscono con l'orario rispettivo.
 - *Chi siamo*: pagina che descrive brevemente il Festival e contiene i vari ringraziamenti.
 - *Location*: pagina in cui sono presenti le informazioni per raggiungere il Festival.
 - *Merch*: pagina in cui vengono visualizzati e descritti brevemente gli item  del merch che possono essere acquistati in Loco.
 - *Prevendita*: pagina in cui vengono mostrati i biglietti che si possono acquistare online. Inoltre vengono descritti i vantaggi dell'acquisto di un biglietto categoria VIP, l'acquisto rimane però bloccato ad utenti non autentificati.
 - *Domande*: pagina in cui vengono mostrate le domande più frequenti e le relative risposte.
 - *Account*: pagina  per poter effettuare l'accesso.
 - *Privacy Policy*: pagina che contiene le informative riguardo la privacy.

=== Area riservata utente
 - *Registrazione*: pagina che permette all'utente generico di potersi registrare. L'attività di registrazione richiede nome, cognome, età, indirizzo di residenza, email, username e una password.
 - *Account*: una volta effettuato l'accesso si potranno visualizzare i propri dati personali inseriti precedentemente, nella fase di registrazione. Una sezione permette all'utente di modificare indirizzo di residenza, email o password. La visualizzazione delle prevendite acquistate sotto forma tabellare se presenti. Inoltre permette l'accesso alla pagina di eliminazione dell'account.
 - *Eliminazione*: pagina che consente l'eliminazione dell'account dal sito web. È richiesta la password.
 
=== Area Amministrativa
- *Account*: sempre in questa pagina l'admin può visualizzare gli eventi e gli artisti che si esibiranno. Ha la possibilità di effettuare l'inserimento di eventi o la loro rimozione.

== Struttura gerarchica 
La gerarchia è stata sviluppato principalmente in ampiezza.
Il menù principale ha come sezioni: Home, Chi Siamo, Location, Merch, Prevendite,Domande, Account per un totale di 7 voci.
La profondità massima è 3: nella pagina Account abbiamo di Registrazione e per la pagina di eliminazione dell'Account.

== Schema organizzativo 
È stato adottato uno schema esatto per i contenuti ospitati nel sito, garantendo che ogni sezione sia mutualmente esclusiva, con contenuti distinti e senza sovvrapposizioni. La categorizzazione degli eventi è stata implementata seguendo un ordine cronologico.

=== Lingua 
Il sito web rispetta la lingua e cultura italiana, eventuali parole inglesi sono state marcate con il tag _span_ e attributo _lang='en'_.

= Realizzazione 

In questa sezione vengono mostrate le decisione intraprese nel corso dello sviluppo.

== HTML
Il sito, come da specifiche di progetto, è stato sviluppato seguendo la sintassi di HTML5.
Il gruppo si è impegnato nell'utilizzare i tag semantici corretti già dai primi momenti dello sviluppo, inoltre il processo di scrittura di codice HTML è stato sempre accompagnato da relativa validazione. 

Nel corso dello sviluppo abbiamo cercato di mantenere un rapporto di massima separazione tra il contenuto HTML e le componenti di php, competenti della loro unione in quello che sarà il codice HTML finale, quello che sarà poi disponibile all'utente. 
Nella nostra repository è infatti presente una cartella "html" in cui sono contenute tutte le componenti html necessarie alla visualizzazione del sito.
Le pagine "struttura.html","header.html", "footer.html", "menu.html" contengono la struttura portante di tutte le pagine presenti sul sito, sono state usate come template e poi dinamicamente modificate a formare il risultato finale. 

== Struttura principale
La struttura di ogni pagina si caratterizza di un header, un main e un footer.
Nell'header possiamo trovare il logo, il nome del festival, le icone dei social e il menù principale.
Nel Main il contenuto della pagina.
Nel footer le icone dei social, i diritti di copyright e l'informativa riguardante la privacy. 

== Pagine di errore 
Sono state personalizzate le pagine di errore 404, ad esempio se l'utente visitasse un link scorretto o inesistente, e la pagina di errore 500, in caso si verificassero errori nel server interno. I messaggi servono per non disorientare l'utente e contribuire a mantenere un clima di fiducia. 

== CSS
Il design è stato sviluppato inizialmente per il sito nella sua versione Desktop, successivamente è stato rielaborato per l'acceso tramite schermi di dimensioni minori. 
Il layout finale è responisive: si utilizzano punti di ruttura e all'interno di essi si garantisce fluidità.
Le principali differenze tra le due visulazzazioni si trovano nel menu di navigazione principale e nella tabella relativa agli ordini degli utenti. 
Il primo viene trasformato in un menu ad hamburger, reso accessibile anche agli screen reader. La tabella viene invece resa verticale, eliminando l'header dalla visualizzazione (anche per gli screen reader), e sostituendone le funzionalità tramite l'utilizzo del costrutto _td:before_ per iniettare nella singola cella il contenuto dell'attributo _data-title_.
Il menu ad hamburger e il suo funzionamento sono stati garantiti solo attraverso l'utilizzo di css, una funzione javascript permette invece di poterlo cliccare una volta raggiunto tramite navigazione con il tasto _tab_. 
Per garantire una maggiore accessibilità è stata implementata una classe css chiamata accessibleHide: questa classe ci permette di eliminare gli elementi dalla vista mantenendoli però rilevabili dagli screen reader.

=== Layout di stampa  

Come da specifiche di progetto viene fornito un file .css, dedicato al layout di stampa del sito. Sono stati rimossi il menù, le immagini del carosello, i pulsanti di tipo submit dai vari form. Nella stampa le pagine sono solamente in bianco e nero, l'unica eccezione è il logo. Per garantire che un elemento non venisse spezzato su varie pagine si è utilizzata la proprietà _page-break_. 
Su alcune pagine è stato cambiata totalmente la disposizione dei vari elementi per garantire una lettura più piacevole.
 

== Javascript  

Il linguaggio Javascript è stato utilizzato per lo sviluppo del carosello dinamico, per il countdown al giorno di inizio del festival e per mostrare in modo dinamico il prezzo totale inse di acquisto dei biglietti.
Inoltre è stato essenziale nel processo di validazione degli imput inseriti da parte dell'utente, ogni form infatti presenta controlli lato client e produce degli errori che tramite la funzione "appendError" vengono mostrati a schermo all'interno di un determinato _div_.
Abbiamo provveduto, per quanto fattibile, a mantenere gli stessi controlli lato client e lato server. Per i controlli che interagiscono con il database o con le variabili di sessione i controlli rimangono solomente lato server.
Inoltre tutto il sito è stato sviluppato considerando il fatto che sarebbe dovuto rimanere pienamente accessibile e usabile anche nel momento in cui javascript non fosse disponibile o disattivato.
Tutto il codice è stato incorporato all'interno di un unico file in modo tale da limitare le richieste HTTP e per una più agevole manutenzione. Per garantire che tutti gli script aspettassero l'effettivo caricamento del DOM prima di operare è stato fatto ampio uso di event listener legati all'evento DOMContentLoaded.  


== PHP
PHP è stato ampiamente utilizzato. Si riportano successivamente le principali funzioni svolte. 
=== Template
Per evitare duplicazione di codice e favorire il riuso di quest'ultimo, il PHP si occupa della costruzione dinamica delle pagine, importando i vari file template HTML e, attraverso ancoraggi e funzioni di string replace, iniettando il contenuto.
Gli ancoraggi vengono definiti nei file html HTML con le doppie parentesi graffe.
=== Link circolari  
Per rimuovere i link circolari, ovvero link che portano alla stessa pagina, è stata sviluppata una funzione in php che permette di rimuovere direttamente il tag \<a\> se ci troviamo in quella specifica pagina. 
=== Connessione al Database
La classe DBAccess effettua l'effettivo collegamento al database e costituisce l'oggetto effettivo della connesione, mentre le query vengono effettuate tramite la classe DBoperation: per interfacciarsi al database è stata utilizzata la libreria mysqli.
=== Form e validazione degli input
Ogni form è stato configurato per essere gestito da un file PHP dedicato, utilizzando il metodo POST per la trasmissione sicura dei dati. Sono stati garantiti gli stessi controlli presenti nella validazione lato client, inoltre i messaggi di errore vengono ristampanti nel medesimo contenitore utilizzato da js. 
Per i form di dimensione maggiore è stata inoltre implementata la funzionalità di ricostruzione dell'input. 
=== Variabili di sessione
La gestione delle sessioni utente è stata interamente delegata al linguaggio php tramite variabili di sessione. Questo approccio produce un cookie di sessione esistente solo ed esclusivamente nel browser dell'utente, motivo per cui nel nostro sito non è presente un form per acconsentire all'uso dei cookie. 
Per la pagina account, è risultato molto utile salvare l'username su una variabile di sessione, per gestire in modo efficace l'accesso e le interazioni dell'utente.

=== Sicurezza 

 - Nel database le password non sono salvate in modo chiaro su testo, bensì utilizzando l'algoritmo di hashing di default di php usando la funzione _PASSWORD_DEFAULT_;
 - Per prevenire attacchi di tipo _XSS Cross-Site_scripting_ e _Javascript Injection_ sono state sviluppate delle funzioni che tramite espressioni rilevano l'immisione di tag html all'interno degli input form; 
 - Sono state realizzate query parametriche per prevenire attacchi di tipo SQL Injection.

== Database  

Come Database si è deciso di usare MYSql, classico database di tipo relazionale. Disponiamo di 5 tabelle:
 - Tabella _users_ in cui vengono elencati tutti gli utenti registrati al sito, con relative informazioni anagrafiche;
 - Tabella _Programma_ in cui si memorizzano gli artisti e l'orario in cui si esibiranno, insieme all'indirzzo relativo;
 - Tabella _Biglietti_ in cui si salvano le varie tipologie di Biglietti che è possibile acquistare;
 - Tabella _Ordini_ per registrare tutti gli ordini effettuati dagli utenti;
 - Tabella _Shop_ per salvare gli articoli, che è possibile acquistare al Festival. 

 Nelle tabelle Shop e Programma, per gestire le immagini, si è salvato il path della locazione delle foto.
 Tutte le foto hanno una dimensione inferiore al MB, e sono stati sviluppati i relativi controlli, lato php e js, per evitare il carimento di immagini più pesanti o di formati non accettati.


= SEO  
Vengono elencate le considerazioni che il gruppo ha adottato per favorire un buon indice di posizionamento all'interno dei motori di ricerca:

  + Codice HTML5 e CSS sono stati validati;
  + L'adozione di parole chiave comuni a tutte le pagine e alcune varianti a seconda della pagina, all'interno del meta tag "keyword";
  + In ogni pagina è presente un "title" che va dal particolare al generale, in modo da fornire un contesto specifico;
  + È stato usato un unico file Javascript;
  + È presente un design Responsive;
  + È stato creato un file "robots.txt", per evitare l'indicizzazione di alcune pagine dai motori di ricerca, considerate non essenziali, in modo tale che le risorse dei crawler siano orientate verso le pagine più ricche di contenuto e non verso pagine sensibili o di amministrazione.

Vengono di seguito elencate, in ordine di importanza, le ricerche a cui il sito si propone di rispondere:

  + Nome del Festival(TechnoLum250);
  + Date dello svolgimento del Festival;
  + Parole generiche quali Festival, Padova, Evento etc.;
  + Nomi degli artisti presenti al Festival.

= Test 

== Validazione sito 
Per validare il codice HTML5 del sito è stato usato come strumento #link("https://validator.w3.org/") e Total Validator Basic presente nei Pc del paolotti.
Per validare il codice CSS è invece stato usato #link("https://jigsaw.w3.org/css-validator/")

== Browser web 
Sono stati testati i seguenti browser:

  - Google Chrome;
  - Mozilla Firefox;
  - Microsoft Edge;
  - Opera;
  - Brave;

  Per quanto riguarda il testing su Safari, dato che nessuno dei componenti possiede alcun dispostivo Apple, e che l'ultima versione rilasciata per dispositivi Window non supporta _flexbox_, non ci è stato possibile.
  Per testare il sito su dispositivi mobili, si sono usati gli strumenti per sviluppatori sia di Google Chrome che di Firefox.

= Accessibilità  

Per rendere il sito accessibile si sono usati i seguenti strumenti: 
 - Total Validator presente nei pc di laboratori del Paolotti;
 - Wave, un estensione per Google Chrome;
 - L'anlisi dell'accessibili offerta da Mozilla Firefox;
 - Lo screen Reader NVDA su Windows e per ambienti Linux il sistema _orca_.

== Tabindex 
Non è stato alterato l'ordine naturale dei tabindex. 

== Aiuti alla navigazione
È presente un pulsante per saltare direttamente al contenuto e un pulsante per tornare al menu di navigazione interna alla pagina sviluppato per la pagina _Home_ (l'implementazione è stata limitata a tale pagina in quanto l'unica pagina ad avere una lunghezza che lo rende necessario).

== Colori 
Si è prestata molta attenzione ai colori e ai contrasti, i contrasti sono stati per lo più rilevati tramite strumenti automatici.
Per quanto riguarda gli utenti soggetti ad alterazione del senso cromatico, il gruppo ha effettuato varie simulazioni a garantire che il contenuto potesse rimanere ugualmente fruibile.
Inoltre si precisa che i colori non sono mai stati usati come unica modialità di trasmissione dell'informazione, per esempio tutti i link risultano essere sottolineati.  
== Tabella 
La tabella degli ordini nella Pagina _Account_ è stata resa accessibile, adottando i criteri standard.


= Installazione Progetto 
Questa guida consente, a partire dalla consegna effettuata tramite moodle, di reinstallare il progetto nel server dedicato.
Se il progetto dev'essere istallato sul server gdovidio non è necessario aggiornare il contenuto dei file. 
Si elencano i passaggi da eseguire.
  + Nel file src/phputilities/DBAccess.php si devono cambiare le credenziali di accesso al database;
  + Accedere a _phpmyadmin_ e eliminare il contenuto del proprio database; 
  + Sostituire il nome del database usato nel file init-scripts/init.sql; 
  + Importare il database tramite _phpmyadmin_; 
  + inserire tutto il contenuto della cartella src (non la cartella stessa) all'interno della cartella public_html del server; 
  + Dobbiamo ancora inserire la parte relativa ala gestione degli errori. 


Norme riguardanti l'attività di installazione del progetto sul server:
  + Nel file DBAccess si devono cambiare le credenziali di accesso al database;
  + Si copia la cartella src, all'interno della cartella public_html del server di tecweb;
  + Su phpmyadmin si importa il file init.sql presente nella cartella sql;
  + Per la gestione degli errori personalizzata bisogna modificare il file .htaccess impostando il percorso assoluto della pagina:
     ErrorDocument [errore] #link("http://tecweb.studenti.math.unipd.it/errore[errrore].php")
  
  in cui [errore] va sostituito con 404 e 500.



= Organizzazione

== Organizzazione interna  
Per lavorare in maniera efficente al progetto, si è deciso di adottare Docker: è stato realizzato un file docker compose che una volta avviato mettesse a disposizione del team tutte le componenti necessarie allo sviluppo nelle medesime versioni. Inoltre durante lo sviluppo si sono fatte continue prove nel server deedicato. 
Per la condivisione e il versionamento del codice sorgente si è utilizzato GitHub.



== Suddivisione lavoro 

   - Davide Malgarise:
        - CSS;
        - layout di stampa; 
        - HTML pagine statiche;
        - Verifica relazione.
        - Attività di revisione del codice.
   - Giacomo D'Ovidio:
        - Template HTML;
        - PHP;
        - Database: creazione file e operazioni;
        - Javascript: controlli front-end;
        - Garante dell'accessibilità;
        - Validazione input;
        - Relazione.
   - Marco Piccoli:
        - HTML pagine statiche;
        - CSS;
        - Carosello dinamico e animazioni css e Javascript;
        - Verifica relazione.
        - Attività di revisione del codice.
   - Riccardo Alberto Costantin;
        - Amministratore della repository; 
        - Template HTML;
        - PHP;
        - Database: accesso e operazioni;
        - Javascript: controlli front-end;
        - Validazione input;
        - Relazione.



= Conclusioni
Il gruppo conviene nel dire che il  progetto è stata un esperienza estremamente formativa e interessante. 
Si è infatti avuto modo di sviluppare e consolidare competenze tecniche molto importanti anche in vista di ipotetici sbocchi professionali. 
Il gruppo essendo per lo più composto da componenti provenienti da Licei scientifici tradizionali non aveva mai avuto modo di imterfacciarsi direttamente a queste tecnologie. 
Inoltre si sono dovute affrontare tutta una serie di difficoltà legate allo sviluppo non individuale( problemi di comunicazione, di gestione del codice sorgente condiviso, di pianificazione, etc). 
Nel farlo possiamo dire di aver imparato molto. 











  





