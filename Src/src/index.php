<?php
include "phputilities/PageBuilder.php";
include "phputilities/database_connection.php"; 

$breadcrumbs = 'Home';
$breadcrumblen = 'en'; 
$keyword = 'Festival, Techno, Shop, Prevendite, Concerti, Lum250, Artisti, Merch'; 
$description = 'Pagina dedicata al festival Techno Lum250'; 



$main = "<h1>Programma</h1>";

echo replace_in_page($template,$breadcrumbs, $breadcrumblen, $keyword, $description, $main);



?>
