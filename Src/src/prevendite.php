<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Prevendite';
$breadcrumblen = 'it';
$title = 'Prevendite | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Prevendite, Biglietti, Acquisto, Compra, Ticket, Pass'; 
$description = 'Acquista i biglietti per il festival TechnoLum250, scopri i nostri ticket e i nostri pass.'; 

$main = "<h1>Prevendite</h1>";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>