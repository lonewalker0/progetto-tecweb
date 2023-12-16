<?php
include('phputilities/PageBuilder.php');
include('phputilities/LoginForm.php');

$breadcrumb = 'Account';
$breadcrumblen = 'en'; 
$title = 'Account | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Account, Dati personali, Pagamenti, Biglietti, Ordini'; 
$description = 'Gestisci il tuo account TechnoLum250, modifica i tuoi dati personali, visualizza i tuoi pagamenti, i tuoi biglietti e i tuoi ordini.'; 

if(!$_SESSION["username"]){
    $main=file_get_contents(__DIR__ .'/html/layout/loginform.html');
    

}else{
    $main="<h1>Benvenuto</h1>";
}


   
    # se l'utente non è autenticato allora mi mostri il form altrimenti 

    #controllo dell'utente, se è admin o normale
   

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>