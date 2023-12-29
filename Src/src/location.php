<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Location';
$breadcrumblen = 'en'; 
$title = 'Location | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Location, Posto, Dove, Mappa, Indirizzo, Come arrivare';
$description = 'Scopri la location del festival TechnoLum250, dove si svolgerà e come raggiungerla.'; 

// Google Maps
$latitude = 45.4084406;
$longitude = 11.8848788;
$zoomLevel = 17;

$main = "<h1>Location</h1>
<h2>Dove si svolge il festival?</h2>

<p>Università degli Studi di Padova - Dipartimento di Matematica</p>
<p>Via Luigi Luzzatti, 35121 Padova PD</p>
";

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>
