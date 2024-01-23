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
Tali utenti, oltre a tutte le possibilità offerte al visitatore Standart , devono poter aggiornare i propri dati personali, acquistare prevendite e visualizzare i dettagli degli acquisti. 

=== Admin: 
L'admin ha inoltre la possibilità di modificare la lineup del festival inserendo ed eliminando gli eventi.  
Tali eventi sono caratterizzati univocamente dal perfomer, da una sua foto, da un data e da un orario e da un descrizione.

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
=== Logo cliccabile
Il team ha scelto di addottare la pratica ormai quasi universale nel web design di associare al logo un link cliccabile che riporto alla pagina home. Tramite espressioni regolari si è garantita l'eliminazione dei link circolari. 
=== Breadcrumbs
Abbiamo abbracciato la convenzione di addottare una breadcrumbs per favorire la navigazione, e limitare il sovraccarico cognitivo per l'utente.

== [forse qui sarebbe da mettersi a scrivere qualcosa sulla struttura organizzativa.]
 









= SEO  
Vengono elencate le considerazioni che io team ha adottato per favorire un buon indice di posizionamento all'interno dei motori di ricerca:

  + Codice HTML5 e CSS sono stati validati;
  + L'adozione di parole chiave comuni a tutte le pagine e alcune varianti a seconda della pagina, all'interno del meta tag "keyword";
  + In ogni pagina è presente un "title" che va dal particolare al generale, in modo da fornire un contesto specifico;
  + È stato usato un unico file Javascript;
  + È presente un design Responsive;
  + È stato creato un file "robots.txt", per evitare l'indicizzazione di alcune pagine dai motori di ricerca, considerate non essenziali, in modo tale che le risorse dei crawler siano orientate verso le pagine più ricche di contenuto e non verso pagine sensibili o di amministrazione.

La gerarchia del sito è stata sviluppata in ampiezza con una grandezza pari a 7 e una profondità massima di 3 livelli.

Vengono di seguito elencate, per importanza, le ricerche a cui il sito si propone di rispondere:

  + Nome del Festival(TechnoLum250);
  + Date dello svolgimento del Festival;
  + Parole generiche quali Festival, Padova, Evento etc.;
  + Nomi degli artisti presenti al Festival.






  


= Progettazione e implementazione



