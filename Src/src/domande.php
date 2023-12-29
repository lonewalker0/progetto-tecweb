<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Domande';
$breadcrumblen = 'it';
$title = 'Domande | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Domande, FAQ, Risposte, Informazioni, Informazioni generali, Informazioni sul festival, Informazioni sulle prevendite, Informazioni sulle attività, Informazioni sulle location, Informazioni sulle date'; 
$description = 'Hai dubbi o domande sul festival TechnoLum250? Vieni a leggere le nostre FAQ e trova le risposte che cerchi.'; 

$main = "
<div class='faq-container'>

<h1>Domande frequenti (FAQ)</h1>

<div class='faq-section'>
    <h2 class='faq-title'>Informazioni generali sul festival</h2>
    <div class='faq-box-container'>
    <div class='faq-item'>
        <p class='question'>Qual'è l'età minima per poter partecipare a TechnoLum250 Festival?</p>
        <p class='answer'>L'età minima per accedere al festival è 16. Le persone nate nell'anno 2008 avranno l'entrata garantita, anche se compiono i 16 anni dopo lo svolgimento dell'evento. Chiunque compia i 16 anni nel 2024 sarà ammesso.</p>
        <p class='answer note'>Chiunque nato nell'anno 2009 o successivo, anche se accompagnato da persona adulta, non potrà accedere al festival.</p>  
    </div>

    <div class='faq-item'>
        <p class='question'>Qual'è la <span lang='en'>line-up</span>?</p>
        <p class='answer'>Tieni d'occhio i nostri canali social per essere il primo a sapere quando arriveranno nuovi nomi al TechnoLum250 Festival.</p>
        <p class='answer note'>Puoi scoprire la <span lang='en'>line-up </span>nella pagina <a href='index.php'>home<a/>.</p>
    </div>

    <div class='faq-item'>
        <p class='question'>Quali oggetti sono vietati all'interno di TechnoLum250 festival?</p>
        <p class='answer'>Non è ammesso entrare nel territorio del festival con i seguenti oggetti:</p>
        <ul>
            <li>armi da fuoco, armi bianche e oggetti appuntiti</li>
            <li>droga (eccetto per medicinali accompagnati da prescrizione medica)</li>
            <li>bottiglie o contenitori di vetro</li>
            <li>animali (eccetto varani di Komodo)</li>
            <li>cibo e bevande non venduti nei punti vendita da noi disposti</li>
            <li>fuochi d'artificio</li>
            <li>droni</li>
            <li>spray</li>
            <li>bandiere UDU Padova o appartenenti a comunità LGBTQ+S</li>
            <li>qualsiasi altro oggetto che può essere considerato pericoloso dall'organizzazione</li>
        </ul>
        <p class='answer note'>Ogni istruzione disposta dal nostro personale deve essere immediatamente seguita. In caso di sospetto o effettivo possesso degli oggetti sopra riportati, la sicurezza è autorizzata a fermarti.</p>
    </div>
    </div>
</div>

<div class='faq-section'>
    <h2 class='faq-title'>Biglietti e acquisti</h2>
    <div class='faq-box-container'>
    <div class='faq-item'>
        <p class='question'>Dove posso acquistare i biglietti per TechnoLum250 Festival 2024?</p>
        <p class='answer'>Registrati presso la nostra pagina <span lang='en'>Account</span> per avere accesso alla vendita dei biglietti.
        Maggiori informazioni riguardo la registrazione e la gestione dei propri acquisti possono essere trovati nella pagina<a href='account.php'>account<a/>.</p>
        <p class='answer note'>Importante: la registrazione non garantisce l'acquisto dei biglietti, che saranno disponibili in quantità limitata.</p>
    </div>

    <div class='faq-item'>
        <p class='question'>Come posso acquistare il merch dedicato?</p>
        <p class='answer'>Puoi acquistare i nostri articoli presso i punti vendita presenti in loco al festival.</p>
    </div>

    <div class='faq-item'>
        <p class='question'>Posso chiedere il rimborso, un cambio o rivendere i miei ticket?</p>
        <p class='answer'>In linea generale la nostra policy non prevede il rimborso o il cambio dei ticket acquistati. Ad ogni modo in specifici casi (per esempio in relazione ad una cancellazione del festival per cause di forza maggiore),
         allora il rimborso può essere previsto applicando una penale del 3% per spese amministrative. Non potrai più partecipare all'evento?
         Il voucher elettronico che rappresenta il ticket non è nominale e per questo può essere trasferito senza una procedura particolare.</p>
    </div>
    </div>
</div>
</div>
";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>
