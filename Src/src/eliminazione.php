<?php
include('phputilities/PageBuilder.php');

$breadcrumb = '<a href="account.php">Account</a>&nbsp>> Elimina';
$breadcrumblen = 'it'; 
$title = 'Elimina Account | TechnoLum250';
$keyword = 'Festival, Techno, Lum250, Account, Eliminazione;'; 
$description = 'Eliminazione account dal festival :('; 

$main= "<h1 id='conferma'>Conferma eliminazione</h1>";
$main.= '<div id="errorContainerEliminazione">'; 
        if (isset($_SESSION['form_delete_errors'])) {
            foreach ($_SESSION['form_delete_errors'] as $error) {
                $main .= '    <p>' . $error . '</p>';
            }
            unset($_SESSION['form_delete_errors']);
        }
        $main .= '</div>';
$main.= file_get_contents(__DIR__ . '/html/form/deleteuser.html');


echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>