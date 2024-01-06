<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include('phputilities/PageBuilder.php');
include('phputilities/adminOperation.php'); 

$breadcrumb = 'Registrazione';
$breadcrumblen = 'it'; 
$title = 'Registrazione | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Account, Dati personali, Pagamenti, Biglietti, Ordini'; 
$description = 'Registrati al sito di TechnoLum250, inserisci i dati personali e le informazioni di accesso.'; 


$main = "<h1>Registrazione</h1>";




$main .=file_get_contents(__DIR__.'/html/form/registerform.html');    

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>