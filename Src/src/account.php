<?php
include('phputilities/PageBuilder.php');
include('phputilities/LoginForm.php');

$breadcrumb = 'Account';
$breadcrumblen = 'en'; 
$title = 'Account | TechnoLum250'; 
$keyword = 'Festival, Techno, Lum250, Account, Dati personali, Pagamenti, Biglietti, Ordini'; 
$description = 'Gestisci il tuo account TechnoLum250, modifica i tuoi dati personali, visualizza i tuoi pagamenti, i tuoi biglietti e i tuoi ordini.'; 

session_start(); 

if (!isset($_SESSION["username"])) {
    // User is not logged in
    $main = file_get_contents(__DIR__ . '/html/layout/loginform.html');
} else {
    // User is logged in
    $main = "<h1>Welcome";

    if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === true) {
        // Admin-specific content
        $main .= " Admin";
    } elseif (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"] === false) {
        // Non-admin-specific content
        $main .= " Non-Admin";
    }

    $main .= "</h1>";
    $main .= '<form action="phputilities/logoutprocess.php" method="post"> <button type="submit" name="logout">Logout</button></form>';

    // Add other user-specific content here
}

    

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);
?>