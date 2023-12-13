<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Festival >> Storia';
$breadcrumblen = 'it'; 
$title = 'Storia | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, Storia, Eventi passati'; 
$description = 'Vieni a conoscere la storia del festival TechnoLum250, scopri i nostri eventi passati e le nostre origini.'; 

$main = "<h1>Storia</h1>";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>