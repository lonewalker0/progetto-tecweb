<?php
include "dynamic/utilities.php";


$template = file_get_contents('layout/struttura.html');

$breadcrumbs = '<p>Ti trovi in: <span lang="en">Home</span></p>';

$main = "<h1>Programma</h1>";

echo replace_in_page($template,$breadcrumbs,'Festival, Techno, Shop, Prevendite, Concerti, Lum250, Artisti, Merch','Pagina dedicata al festival Techno Lum250', $main);



?>
