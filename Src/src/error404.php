<?php
include('phputilities/PageBuilder.php');


$breadcrumb = 'Pagina non trovata';
$breadcrumblen = 'it'; 
$title = 'Pagina non trovata | TechnoLum250';
$keyword = 'Padova, Festival, evento, Techno, Lum250,TechnoLum250, 404, errore, pagina non trovata;'; 
$description = 'Pagina non trovata'; 

$main = "
<div id='error-container'>
    <img src='../assets/error404.png' alt=''>
    <h1>Pagina non trovata.</h1>
    <h2>La pagina che hai cercato non é disponibile.</h2>
    <p>Controlla l'indirizzo digitato.</p>
</div>";


echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>