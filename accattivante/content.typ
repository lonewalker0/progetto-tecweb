= Test e strumenti 

== Validazione 

Per validare il codice HTML5 del sito sono stati usati gli strumenti _#link("https://validator.w3.org/")_ e Total Validator Basic presente nei computer del Paolotti.
Per validare il codice CSS è invece stato usato _#link("https://jigsaw.w3.org/css-validator/")_.
Il sito non presenta errori.

== Browser web 
Sono stati testati i seguenti browser sui seguenti sistemi operativi:
 - *Windows 10 - Windows 11*:

    - Google Chrome versione 121.0.6167.184;
    - Mozilla Firefox versione 123.0;
    - Microsoft Edge versione 122.0.2365.52;
    - Opera versione ?;
    - Brave versione  1.63.162 - 122.0.6261.69(Chromium).
 - *Linux (Pop Os 22.04)*:
    - Google Chrome versione 121.0.6167.184;
    - Mozilla Firefox versione 123.0;
    - Microsoft Edge versione 122.0.2365.52;
    - Brave versione  1.63.162 - 122.0.6261.69(Chromium).


Per quanto riguarda il testing su Safari, dato che nessuno dei componenti possiede alcun dispositivo Apple, e che l'ultima versione rilasciata per dispositivi Window non supporta _flexbox_, non è stato possibile.
Per testare il sito su dispositivi mobili, si sono usati gli strumenti per sviluppatori sia di Google Chrome che di Firefox e scalano molto positivamente.

== Test umani
Per testare navigabilità e usabilità del sito è stato fatto provare ad utenti reali delle cerchie di conoscenza dei componenti del gruppo, in generale si sono sempre ottenuti responsi positivi.

== Accessibilità  

Per rendere il sito accessibile si sono usati i seguenti strumenti: 
 - Total Validator presente nei pc di laboratori del Paolotti;
 - Wave, un'estensione per Google Chrome;
 - L'analisi dell'accessibilità offerta da Mozilla Firefox;
 - Lo screen reader NVDA su Windows e per ambienti Linux il sistema _orca_;
 - Per le performance LighHouse.

=== Tabindex 
Non è stato alterato l'ordine naturale dei _tabindex_. 

=== Aiuti alla navigazione
È presente un pulsante per saltare direttamente al contenuto.

=== Colori 
Si è prestata molta attenzione ai colori e ai contrasti, i contrasti sono stati per lo più rilevati tramite strumenti automatici.
Per quanto riguarda gli utenti soggetti ad alterazione del senso cromatico, il gruppo ha effettuato varie simulazioni a garantire che il contenuto potesse rimanere ugualmente fruibile.
Inoltre si precisa che i colori non sono mai stati usati come unica modalità di trasmissione dell'informazione, per esempio tutti i link risultano essere sottolineati.  

=== Alt
Gli attributi alt delle immagini sono stati volutamente mantenuti vuoti, tali immagini infatti non aggiungono nessuna informazione al contenuto del sito, e dunque inserirli sarebbe stato pressochè inutile per i fruitori tramite screen reader.

=== Tabella 
La tabella degli acquisti nella Pagina _Account_ è stata resa accessibile, adottando i criteri standard, ovvero la presenza di attributi _scope_, _data-title_ e una breve descrizione tramite _aria-describedby_.

== Risultati 

#figure(
  image("assets/tabellasitogenerale.png", width: 100%),
  caption: [Test per le pagine normali]
)

#figure(
  image("assets/areautente.png", width: 100%),
  caption: [Test per le pagine utenti]
)

#figure(
  image("assets/area_admin.png", width: 100%),
  caption: [Test per la pagina admin]
)

#figure(
  image("assets/foglistile.png", width: 65%),
  caption: [Test per i fogli di stile]
)