<?php
include('phputilities/PageBuilder.php');
include('phputilities/indexmainbuilder.php'); 

$breadcrumb = 'Home';
$breadcrumblen = 'en'; 
$title = 'Home | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Programma, Concerti, Artisti, Cantanti, Shop'; 
$description = 'Pagina dedicata al festival Techno Lum250, con il nostro programma per i prossimi eventi e artisti presenti.';

// Create an instance of IndexMainBuilder
$indexMainBuilder = new IndexMainBuilder();
// Call the buildMainHTML method to get the generated HTML
$main = $indexMainBuilder->buildMainHTML();

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>
include('./js/function.js')