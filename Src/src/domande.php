<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Domande';
$breadcrumblen = 'it';
$title = 'Domande | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Domande, FAQ, Risposte, Informazioni, Informazioni generali, Informazioni sul festival, Informazioni sulle prevendite, Informazioni sulle attività, Informazioni sulle location, Informazioni sulle date'; 
$description = 'Hai dubbi o domande sul festival TechnoLum250? Vieni a leggere le nostre FAQ e trova le risposte che cerchi.'; 

$main = "<h1>Domande</h1>";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>
