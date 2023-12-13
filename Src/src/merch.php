<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Shop >> Merch';
$breadcrumblen = 'en';
$title = 'Merch | TechnoLum250'; 
$keyword = 'Merch, Shop, Magliette, Felpe, Gadget, Store, Acquisto, Compra, Prodotti, Ufficiali'; 
$description = 'Esplora il nostro store e acquista i nostri prodotti ufficiali presso il nostro festival.'; 

$main = "<h1>Merch</h1>";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>