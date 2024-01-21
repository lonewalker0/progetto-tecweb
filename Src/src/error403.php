<?php
include('phputilities/PageBuilder.php');


$breadcrumb = 'Accesso ristretto';
$breadcrumblen = 'it'; 
$title = 'Accesso ristretto | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, 403, errore, accesso ristretto, risorsa;'; 
$description = 'Accesso ristretto'; 

$main = "
<img src='../assets/error403.png' alt='403 Accesso ristretto'>

<h1>Purtroppo non hai accesso a questa risorsa!</h1>
    
<h2>Verrai reinderizzato alla home tra pochi secondi...</h2>";

header('Refresh: 5; URL=index.php');

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>