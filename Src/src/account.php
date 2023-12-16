<?php
include('phputilities/PageBuilder.php');
include('phputilities/form.php');

$breadcrumb = 'Account';
$breadcrumblen = 'en'; 
$title = 'Account | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Account, Dati personali, Pagamenti, Biglietti, Ordini'; 
$description = 'Gestisci il tuo account TechnoLum250, modifica i tuoi dati personali, visualizza i tuoi pagamenti, i tuoi biglietti e i tuoi ordini.'; 

$main = Form::buildForm() ;

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>