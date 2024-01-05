<?php
include('phputilities/PageBuilder.php');
include('phputilities/shopmainbuilder.php'); 

$breadcrumb = 'Merch';
$breadcrumblen = 'en';
$title = 'Merch | TechnoLum250'; 
$keyword = 'Merch, Shop, Magliette, Felpe, Gadget, Store, Acquisto, Compra, Prodotti, Ufficiali'; 
$description = 'Esplora il nostro store e acquista i nostri prodotti ufficiali presso il nostro festival.'; 

$shopMainBuilder = new shopMainBuilder();
// Call the buildMainHTML method to get the generated HTML
$main = "<h1>Prodotti</h1>";
$main .= $shopMainBuilder->buildMainHTML();

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>