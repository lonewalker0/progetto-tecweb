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


// Verifica se l'utente è autenticato
if (!isset($_SESSION['username'])) {
    $main .= "<p>Per procedere all'acquisto dei biglietti, si prega di autenticarsi. <a href='account.php' tabindex=0>Accedi</a></p>";
}
else {
    
    // Altre cose da mostrare solo agli utenti autenticati
    $bigliettobuilder= new BigliettiBuilder();
    $main.=$bigliettobuilder->buildBigliettoHtml();
}
echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>