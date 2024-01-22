<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Domande';
$breadcrumblen = 'it';
$title = 'Domande | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, TechnoLum250, Domande, FAQ, Risposte, Informazioni, Informazioni generali, Informazioni sul festival, Informazioni sulle prevendite, Informazioni sulle attività, Informazioni sulle location, Informazioni sulle date'; 
$description = 'Hai dubbi o domande sul festival TechnoLum250? Vieni a leggere le nostre FAQ e trova le risposte che cerchi.'; 

$main = file_get_contents(__DIR__.'/html/domande.html'); ;

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>
