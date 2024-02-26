<?php
include('phputilities/PageBuilder.php');
include('phputilities/PrivacyBuilder.php');
$breadcrumb = 'Privacy Policy';
$breadcrumblen = 'en'; 
$title = 'Privacy Policy | TechnoLum250'; 
$keyword = 'Padova, Festival, evento, Techno, Lum250, TechnoLum250,  Privacy, Policy, Termini, Condizioni, Cookies'; 
$description = 'Privacy Policy adottata dal Festival TechnoLum250 per gli utenti che fruiscono del nostro sito web';

$privacyBuilder = new PrivacyBuilder();
$main = $privacyBuilder->buildMainHTML();

echo PageBuilder::buildPage($breadcrumb, $breadcrumblen, $title ,$keyword, $description, $main);

?>