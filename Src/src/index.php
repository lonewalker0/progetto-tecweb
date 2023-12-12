<?php
include('phputilities/PageBuilder.php');
include('phputilities/indexmainbuilder.php'); 


$breadcrumb = 'Home';
$breadcrumblen = 'en'; 
$title = 'Account | TechnoLum250'; 
$keyword = 'Festival, Techno, Shop, Prevendite, Concerti, Lum250, Artisti, Merch'; 
$description = 'Pagina dedicata al festival Techno Lum250';

// Create an instance of IndexMainBuilder
$indexMainBuilder = new IndexMainBuilder();

// Call the buildMainHTML method to get the generated HTML
$main = $indexMainBuilder->buildMainHTML();



echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);



?>
