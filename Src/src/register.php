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


$main.= '<div id="errorContainerRegistrazione">'; 
        if (isset($_SESSION['add_register_form_errors'])) {
            foreach ($_SESSION['add_register_form_errors'] as $error) {
                $main .= '    <p>' . $error . '</p>';
            }
            unset($_SESSION['add_register_form_errors']);
        }
        $main .= '</div>';


$formContent =file_get_contents(__DIR__.'/html/form/registerform.html');   
$placeholders = [
    '{{nome}}',
    '{{cognome}}',
    '{{eta}}',
    '{{indirizzo}}',
    '{{email}}',
    '{{username}}'
];


$form_data = isset($_SESSION['add_register_form_data']) ? $_SESSION['add_register_form_data'] : [];
unset($_SESSION['add_register_form_data']);
$replaceValues = [];

$replaceValues[] = isset($form_data['nome']) ? htmlspecialchars($form_data['nome']) : '';
$replaceValues[] = isset($form_data['cognome']) ? htmlspecialchars($form_data['cognome']) : '';
$replaceValues[] = isset($form_data['dataNascita']) ? htmlspecialchars($form_data['dataNascita']) : '';
$replaceValues[] = isset($form_data['indirizzo']) ? htmlspecialchars($form_data['indirizzo']) : '';
$replaceValues[] = isset($form_data['username']) ? htmlspecialchars($form_data['username']) : '';



$formContent = str_replace($placeholders, $replaceValues, $formContent);
$main .= $formContent;


echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>