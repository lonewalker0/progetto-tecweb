<?php
include('phputilities/PageBuilder.php');


$breadcrumb = 'Server Error';
$breadcrumblen = 'it'; 
$title = 'Server Error | TechnoLum250';
$keyword = 'Padova, Festival, evento, Techno, Lum250, TechnoLum250, 500, errore, errore interno server'; 
$description = 'Pagina non trovata'; 

$main = "
<div id='error-container'>
    <img src='assets/error500.png' alt=''>
    <h1>Errore Server.</h1>
    <h2>Stiamo avendo dei problemi tecnici.</h2>
    <p>Ci scusiamo per il disagio.</p>
</div>";


echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>