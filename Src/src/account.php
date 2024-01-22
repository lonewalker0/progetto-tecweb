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
$keyword = 'Festival, Techno, Lum250, TechnoLum250, Account, Dati personali, Pagamenti, Biglietti, Ordini, Eliminazione'; 
$description = 'Gestisci il tuo account TechnoLum250, modifica i tuoi dati personali, visualizza i tuoi pagamenti, i tuoi biglietti e i tuoi ordini.'; 



if (!isset($_SESSION["username"]) ) {
    
    $main = "<h1>Accedi al tuo Account!</h1>";
    $main .= file_get_contents(__DIR__ . '/html/form/loginform.html');

    if (isset($_SESSION['add_login_form_errors'])) {
         
            $main = str_replace('{{loginerror}}', $_SESSION['add_login_form_errors'], $main) ;
        
        unset($_SESSION['add_login_form_errors']);
    }
    
    
    if(isset($_SESSION['NomeUtente_Error'])){
        //solo gli errori di validazione lato php. 
        $errormessage = '<p>Username o password errati, prego riprovare!</p>';
        
        $main = str_replace('{{loginerror}}', $errormessage, $main);
        $main = str_replace('{{NomeUtenteDaReinserire}}', $_SESSION['NomeUtente_Error'], $main);
                unset($_SESSION['NomeUtente_Error']);
    } else {
        $main = str_replace('{{loginerror}}', "", $main);
        $main = str_replace('{{NomeUtenteDaReinserire}}', "", $main);
    }
        
} else {

    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true) {
        // Admin-specific content
        $adminOperation = new adminOperation();
        #bottone per il logout
        $main = '<form id="logout" action="phputilities/logoutprocess.php" method="post"> <div id = "logout-div"><input id="input-logout" type="submit" name="logout" value="Logout"></div></form>'; 
        $main .= $adminOperation->getMain(); 
    } elseif (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === false) {
         
        $main = '<form id="logout" action="phputilities/logoutprocess.php" method="post"> <div id = "logout-div"><input id="input-logout" type="submit" name="logout" value="Logout"></div></form>'; 
        
        
        $accountOperation= new accountOperation();
        $main.=$accountOperation->getMain();
    }
    
}

    

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);

?>