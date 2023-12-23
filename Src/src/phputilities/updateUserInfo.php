<?php
require_once 'DBOperation.php';
session_start();
$dbOperation = new DBOperation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se l'utente è autenticato
    
    if (!isset($_SESSION["username"])) {
        die("Sessione non valida. Utente non autenticato.");
    }

    // Recupera l'username dall'autenticazione della sessione
    $username = $_SESSION["username"];

    // Recupera i dati inviati tramite il modulo
    $indirizzo = $_POST['indirizzo'] ?? '';
    $email = $_POST['email'] ?? '';
    $nuova_password = $_POST['nuova_password'] ?? '';
    $conferma_password = $_POST['conferma_password'] ?? '';
    $vecchia_password = $_POST['vecchia_password'] ?? '';

    
    

    // Verifica se la vecchia password è corretta se l'utente sta cercando di cambiare la password
    if (!empty($nuova_password)) {
        if (!$dbOperation->verifyOldPassword($username, $vecchia_password)) {
            die("La vecchia password non è corretta.");
        }

        

        // Aggiorna la password nel database
        $dbOperation->updatePassword($username, $nuova_password);
    }

    // Aggiorna gli altri dati nel database solo se non sono vuoti
    if (!empty($indirizzo)) {
        $dbOperation->updateIndirizzo($username, $indirizzo);
    }

    if (!empty($email)) {
        $dbOperation->updateEmail($username, $email);
    }

    header("Location: ../account.php"); 
    die();
} else {
    
    die("Richiesta non valida.");
}


?>