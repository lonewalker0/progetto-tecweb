<?php
include('phputilities/PageBuilder.php');
include('phputilities/indexmainbuilder.php'); 
$breadcrumb = 'Home';
$breadcrumblen = 'en'; 
$title = 'Home | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, TechnoLum250, Programma, Concerti, Artisti, Cantanti, Shop'; 
$description = 'Pagina dedicata al festival Techno Lum250, con il nostro programma per i prossimi eventi e artisti presenti.';

$indexMainBuilder = new IndexMainBuilder();
$main = $indexMainBuilder->buildMainHTML();

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);

?>
