<?php
include('phputilities/PageBuilder.php');


$breadcrumb = 'Domande';
$title = 'Domande | TechnoLum250'; 
$breadcrumblen = 'en'; 
$keyword = 'Festival, Techno, Shop, Prevendite, Concerti, Lum250, Artisti, Merch'; 
$description = 'Pagina dedicata al festival Techno Lum250'; 

$main = "<h1>Programma</h1>";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);



?>
