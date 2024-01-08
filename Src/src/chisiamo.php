<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Chi siamo';
$breadcrumblen = 'it'; 
$title = 'Chi siamo | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, Informazioni, Organizzatori;'; 
$description = 'Vieni a conoscere coloro che hanno reso possibile il festival TechnoLum250, organizzatori, collaboratori e volontari.'; 

$main = "
<div id='chi-siamo-container'>
    <h1 id='this-is' class='fade'>THIS IS TECHNOLUM250</h1>
    <div id='storia-festival'>
        <p>
            Nel cuore della città, tra luci scintillanti e futuriste, fioriva il TechnoLum250 Festival. 
            Un'esperienza unica che fondeva musica e tecnologia in un incantevole sinfonìa di suoni e colori.
            Ogni anno, il mondo si fermava per cedere il passo a questa celebrazione eccezionale. 
            Il festival era più di una mera esposizione di talenti musicali; era l'incarnazione dell'innovazione.
            I palchi vibravano con le performance dei più grandi artisti elettronici, 
            ma le strade e gli spazi erano altrettanto vivaci con installazioni interattive e workshop all'avanguardia.
            Il TechnoLum250 non era solo un evento; era un mondo in cui la creatività umana si univa all'evoluzione tecnologica. 
            Le luci danzavano in sincronia con le note, creando un'esperienza sensoriale straordinaria. 
            Il climax del festival, uno spettacolo di luci e suoni che dipingeva il cielo, 
            lasciava gli spettatori incantati e con il desiderio di tornare l'anno successivo per rivivere quell'incanto.
        </p>
    </div>
    <h1>Chi siamo</h1>

     <div id='chi-siamo-contenuto'>

        <img src='assets/festival.png' id='img-chi-siamo' alt='Evento festival'>

        <div id='chi-siamo-testo'>
    
        <p>TechnoLum250 Festival è un evento che riunisce centinaia di ragazzi nel cuore del centro universitario di Padova.
            Tutto nasce dal desiderio degli studenti di salutare il periodo estivo degli esami per lasciarsi trasportare nel vivo dell'estate.
            Questo è reso possibile grazie alla passione e alla collaborazione di molti ragazzi attivi in associazioni culturali, sportive e di volontariato sociale.
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