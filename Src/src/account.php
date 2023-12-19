<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include('phputilities/PageBuilder.php');
include('phputilities/adminOperation.php'); 

$breadcrumb = 'Account';
$breadcrumblen = 'en'; 
$title = 'Account | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Account, Dati personali, Pagamenti, Biglietti, Ordini'; 
$description = 'Gestisci il tuo account TechnoLum250, modifica i tuoi dati personali, visualizza i tuoi pagamenti, i tuoi biglietti e i tuoi ordini.'; 



if (!isset($_SESSION["username"]) ) {
    // User is not logged in
    do {
        // Recupera il messaggio di errore se presente
        $loginError = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';

        
        $main = file_get_contents(__DIR__ . '/html/form/loginform.html');
        //$main = str_replace('{{loginError}}', $loginError, $main);

        // Pulisci la variabile di sessione dell'errore
        unset($_SESSION['login_error']);

        // Ricontrolla il login e imposta eventualmente login_error
        // Questo potrebbe coinvolgere il tentativo di accesso e il reindirizzamento
        // Puoi gestire questa parte in modo più specifico a seconda del tuo flusso di lavoro
        // ...

    } while ($loginError);
} else {

    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true) {
        // Admin-specific content
        $adminOperation = new adminOperation(); 
        $main = $adminOperation->getMain(); 
    } elseif (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === false) {
        // Non-admin-specific content
        $main = " Non-Admin";
    }
    $main .= '<form action="phputilities/logoutprocess.php" method="post"> <button type="submit" name="logout">Logout</button></form>';

    // Add other user-specific content here
}

    

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>