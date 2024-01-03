<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Chi siamo';
$breadcrumblen = 'it'; 
$title = 'Chi siamo | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, Informazioni, Organizzatori;'; 
$description = 'Vieni a conoscere coloro che hanno reso possibile il festival TechnoLum250, organizzatori, collaboratori e volontari.'; 

$main = "
<div class='chi-siamo-container'>

    <h1>Chi siamo</h1>

    <img src='assets/festival.png' id='img-chi-siamo' alt='Evento festival'/>

    <div class='chi-siamo-contenuto'>

        <p id='testo-chi-siamo'>TechnoLum250 Festival è un evento che riunisce centinaia di ragazzi nel cuore del centro universitario di Padova.
            Tutto nasce dal desiderio degli studenti di salutare il periodo estivo degli esami per lasciarsi trasportare nel vivo dell'estate.
            Questo è reso possibile grazie alla passione e alla collaborazione di molti ragazzi attivi in associazioni culturali, sportive e di volontariato sociale.
        </p>

        <p class='ringraziamenti'>I nostri ringraziamenti vanno a:</p>

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
";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>