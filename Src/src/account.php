<?php
session_start(); 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include('phputilities/PageBuilder.php');
include('phputilities/adminOperation.php'); 
include('phputilities/accountOperation.php');

$breadcrumb = 'Account';
$breadcrumblen = 'en'; 
$title = 'Account | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Account, Dati personali, Pagamenti, Biglietti, Ordini'; 
$description = 'Gestisci il tuo account TechnoLum250, modifica i tuoi dati personali, visualizza i tuoi pagamenti, i tuoi biglietti e i tuoi ordini.'; 



if (!isset($_SESSION["username"]) ) {
    // User is not logged in
    #$firstIteration=true;
    $errormessage='<div id=error_login><p>Credenziali non corrette</p></div>';
    #do {
        // Recupera il messaggio di errore se presente
        $main = "<h1>Accedi</h1>";
        $main .= file_get_contents(__DIR__ . '/html/form/loginform.html');
        $loginError = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
        if($_SESSION['login_error']==true){
                $main .= $errormessage;
                #$main = str_replace('{{loginerror}}',$errormessage, $main);

        }
        
        
        
        $main.="<span>Non hai un account</span>";
        $main .="<a href='register.php'>Registrati</a>";
        
       # $main = str_replace('{{loginerror}}', $firstIteration ? '' : $errormessage, $main);
       # $main = str_replace('{{utente}}', $firstIteration ? '' : $errormessage, $main);


        
        #unset($_SESSION['login_error']);

       # $firstIteration=false;

   # } while ($loginError);
} else {

    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true) {
        // Admin-specific content
        $adminOperation = new adminOperation(); 
        $main = $adminOperation->getMain(); 
    } elseif (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === false) {
        // Non-admin-specific content
        $main = "<h1>Il mio account</h1>";
        $accountOperation= new accountOperation();
        $main.=$accountOperation->getMain();
    }
    #bottone per il logout
    $main .= '<form id="logout-button" action="phputilities/logoutprocess.php" method="post"> <input type="submit" name="logout" value="Logout"></form>';

}

    

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);

?>