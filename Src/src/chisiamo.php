<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Chi siamo';
$breadcrumblen = 'it'; 
$title = 'Chi siamo | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, TechnoLum250, Informazioni, Organizzatori'; 
$description = 'Vieni a conoscere coloro che hanno reso possibile il festival TechnoLum250, organizzatori, collaboratori e volontari.'; 

$main = file_get_contents(__DIR__.'/html/chisiamo.html');

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>