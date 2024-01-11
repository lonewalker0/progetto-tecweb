<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Chi siamo';
$breadcrumblen = 'it'; 
$title = 'Chi siamo | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, Informazioni, Organizzatori;'; 
$description = 'Vieni a conoscere coloro che hanno reso possibile il festival TechnoLum250, organizzatori, collaboratori e volontari.'; 

$main = "
<div id='chi-siamo-container'>
    
    <h1>Chi siamo</h1>

     <div id='chi-siamo-contenuto'>

        <img src='assets/festival.png' id='img-chi-siamo' alt='Evento festival'>

        <h2>TechnoLum250 Festival</h2>
        
        <div id='chi-siamo-testo'>
    
        <p>
            Nel cuore della città, tra luci scintillanti e futuriste, nasce TechnoLum250 Festival. 
            Un'esperienza unica che fonde musica e tecnologia in un'incantevole sinfonìa di suoni e colori.
            Ogni anno, il mondo si ferma per cedere il passo a questa celebrazione unica. 
            Il festival è più di una mera esposizione di talenti musicali; è l'incarnazione dell'innovazione.
            I palchi vibrano con le performance dei più grandi artisti elettronici, 
            ma le strade e gli spazi sono altrettanto vivaci con installazioni interattive e workshop all'avanguardia.
            TechnoLum250 non è solo un evento; è un mondo in cui la creatività umana si unisce all'evoluzione tecnologica. 
            Le luci danzano in sincronia con le note, creando un'esperienza sensoriale straordinaria. 
            Il climax del festival, uno spettacolo di luci e suoni che dipingono il cielo, 
            lascia gli spettatori incantati e con il desiderio di tornare l'anno successivo per rivivere quest'incanto.
        </p>

        <p id='ringraziamenti'>I nostri ringraziamenti vanno a:</p>

            <ul id='ul-ringraziamenti'>
                <li>Università degli Studi di Padova</li>
                <li>Comune di Padova</li>
                <li>The Big Bang Pizza</li>
                <li>Libreria Progetto</li>
                <li>Porta Portello</li>
                <li>Bibione spiaggia</li>
            </ul>
        </div>
    </div>
</div>
";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>