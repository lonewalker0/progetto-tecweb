<?php
include('phputilities/PageBuilder.php');

$breadcrumb = 'Location';
$breadcrumblen = 'en'; 
$title = 'Location | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Location, Posto, Dove, Mappa, Indirizzo, Come arrivare';
$description = 'Scopri la location del festival TechnoLum250, dove si svolgerà e come raggiungerla.'; 

$main = file_get_contents(__DIR__.'/html/location.html') ;

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>
