<?php
include('phputilities/PageBuilder.php');
include('phputilities/bigliettibuilder.php');
session_start();
$breadcrumb = 'Prevendite';
$breadcrumblen = 'it';
$title = 'Prevendite | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Prevendite, Biglietti, Acquisto, Compra, Ticket, Pass'; 
$description = 'Acquista i biglietti per il festival TechnoLum250, scopri i nostri ticket e i nostri pass.'; 

$main = "<h1>Prevendite</h1>";



if (isset($_SESSION['purchase_result'])) {
    $main .= "<div id='purchase_result'> " . $_SESSION['purchase_result'] . "</div>";
    unset($_SESSION['purchase_result']);
}
    $bigliettobuilder= new BigliettiBuilder();
    $main.=$bigliettobuilder->buildBigliettoHtml();
    $main.=file_get_contents(__DIR__ .'/html/vip_description.html');

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>