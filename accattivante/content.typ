= Scopo del documento
Questo documento vuole tener traccia delle decisioni e dei test che il nostro gruppo ha effettuato al fine di garantire l'accessibilità del sito.
Vengono inoltre elencati i Browser utilizzati nello sviluppo e dunque nella fase di testing.

= Decisioni rilevanti 
Vengono elencate le decisioni che il gruppo ha intrapreso per garantire l'accessibilità.

== Tabindex 
Non è stato alterato l'ordine naturale dei _tabindex_. 

== Aiuti alla navigazione
È presente un pulsante per saltare direttamente al contenuto.

== Colori 
Si è prestata molta attenzione ai colori e ai contrasti, i contrasti sono stati per lo più rilevati tramite strumenti automatici.
Per quanto riguarda gli utenti soggetti ad alterazione del senso cromatico, il gruppo ha effettuato varie simulazioni a garantire che il contenuto potesse rimanere ugualmente fruibile.
Inoltre si precisa che i colori non sono mai stati usati come unica modalità di trasmissione dell'informazione, per esempio tutti i link risultano essere sottolineati.  

== Alt
Gli attributi alt delle immagini sono stati volutamente mantenuti vuoti, tali immagini infatti non aggiungono nessuna informazione al contenuto del sito, e dunque inserirli sarebbe stato pressochè inutile per i fruitori tramite screen reader.

== Tabella 
La tabella degli acquisti nella Pagina _Account_ è stata resa accessibile, adottando i criteri standard, ovvero la presenza di attributi _scope_, _data-title_ e una breve descrizione tramite _aria-describedby_.

= Test di accessibilità
Di seguito vengono elencati tutti i test condotti e gli strumenti impiegati dal gruppo.
Vengono inizialmente presentati gli strumenti che il gruppo ha utilizzato, successivamente ne vengono elencati i risultati in forma tabellare.

== Test di Validazione 
Per validare il codice HTML5 del sito sono stati usati gli strumenti _#link("https://validator.w3.org/")_ e Total Validator Basic presente nei computer del Paolotti.
Per validare il codice CSS è invece stato usato _#link("https://jigsaw.w3.org/css-validator/")_.
Il sito non presenta errori di validazione, caratteristica necessaria a garantire l'accessibilità.

== Test Manuali
Per testare navigabilità e usabilità del sito è stato fatto provare ad utenti reali delle cerchie di conoscenza dei componenti del gruppo, in generale si sono sempre ottenuti responsi positivi.
Inoltre il gruppo ha ampiamente testato ogni pagina tramite screen reader: sono stati utilizzati lo screen reader _NVDA_ su Windows e per ambienti Linux il sistema _orca_.

== Test Automatici
I test automatici per l'accessibilità sono stati realizzati tramite i seguenti seguenti strumenti: 
 - Total Validator presente nei pc di laboratori del Paolotti;
 - Wave, un'estensione per Google Chrome;
 - L'analisi dell'accessibilità offerta da Mozilla Firefox;
 - Lighthouse (punteggio relativo all'accessibilità).

== Risultati 
Al fine di rappresentare in questa relazione i risultati dei test effettuati si è scelto di dividere raggruppare le pagine in tre macro sezioni: pagine accessibili a tutti gli utenti, pagine riservate a utenti registrati, pagine di amministrazione.
In questi grafici la spunta verde rappresenta la mancanza di errori per quanto riguarda i validatori, mentre per le altre categorie di test rappresenta un risultato positivo.

#figure(
  image("assets/tabgen2.png", width: 100%),
  caption: [Test per le pagine pagine accessibili a tutti gli utenti]
)
#figure(
  image("assets/areautente.png", width: 100%),
  caption: [Test per le pagine riservate a utenti registrati]
)
#figure(
  image("assets/area_admin.png", width: 100%),
  caption: [Test per la pagine di amministrazione]
)
#figure(
  image("assets/foglistile.png", width: 65%),
  caption: [Test per i fogli di stile]
)
Nessuno dei fogli di stili presenta errori.

= Browser web 
Per completezza vengono riportati i browser su cui si è lavorato nello sviluppo e dove di conseguenza sono stati effettuati i test, rispettivamente per sistemi Windows e Linux: 

 - *Windows 10 - Windows 11*:

    - Google Chrome versione 121; 
    - Mozilla Firefox versione 123; 
    - Microsoft Edge versione 122; 
    - Opera versione versione 107; 

 - *Linux (Pop Os 22.04)*:
    - Google Chrome versione 121; 
    - Mozilla Firefox versione 123; 
    - Microsoft Edge versione 122; 
    - Brave versione 122 (Chromium).


Per quanto riguarda il testing su Safari, dato che nessuno dei componenti possiede alcun dispositivo Apple, e che l'ultima versione rilasciata per dispositivi Window non supporta _flexbox_, non è stato possibile.
Per testare il sito su dispositivi mobili, si sono usati gli strumenti per sviluppatori sia di Google Chrome che di Firefox.


= Considerazione aggiuntiva copyright
Per necessità legate alla natura dei contenuti ospitati nel sito web, alcune delle immagini presenti potrebbero non essere conformi al copyright. 