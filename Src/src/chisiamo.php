<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Festival >> Chi siamo';
$breadcrumblen = 'it'; 
$title = 'Chi siamo | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, Informazioni, Organizzatori;'; 
$description = 'Vieni a conoscere coloro che hanno reso possibile il festival TechnoLum250, organizzatori, collaboratori e volontari.'; 

$main = "<h1>Chi siamo</h1>";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>