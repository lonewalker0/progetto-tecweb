<?php
include('phputilities/PageBuilder.php');
include('phputilities/bigliettibuilder.php');
session_start();
$breadcrumb = 'Prevendite';
$breadcrumblen = 'it';
$title = 'Prevendite | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, TechnoLum250, Prevendite, Biglietti, Acquisto, Compra, Ticket'; 
$description = 'Acquista i biglietti per il festival TechnoLum250, scopri i nostri biglietti.'; 

$main = "<h1>Acquista la tua prevendità!</h1>";



if (isset($_SESSION['purchase_result'])) {
    $main .= "<div id='purchase_result' role='alert' aria-live='polite' aria-atomic='true'> " . $_SESSION['purchase_result'] . "</div>";
    unset($_SESSION['purchase_result']);
}
    $bigliettobuilder= new BigliettiBuilder();
    $main.=$bigliettobuilder->buildBigliettoHtml();
    $main.=file_get_contents(__DIR__ .'/html/vip_description.html');

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>