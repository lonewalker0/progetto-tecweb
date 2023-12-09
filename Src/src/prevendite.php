<?php
include('phputilities/PageBuilder.php');


$breadcrumb = 'prevendite';
$breadcrumblen = 'en'; 
$keyword = 'Festival, Techno, Shop, Prevendite, Concerti, Lum250, Artisti, Merch'; 
$description = 'Pagina dedicata al festival Techno Lum250'; 

$main = "<h1>Programma</h1>";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $keyword, $description, $main);



?>