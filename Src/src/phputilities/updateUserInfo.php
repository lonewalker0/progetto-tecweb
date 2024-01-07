<?php
require_once 'DBOperation.php';
include('validationElement.php'); 

session_start();
$dbOperation = new DBOperation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se l'utente è autenticato
    $errors[]='';
    if (!isset($_SESSION["username"])) {
        die("Sessione non valida. Utente non autenticato.");
    }

    // Recupera l'username dall'autenticazione della sessione
    $username = $_SESSION["username"];

    // Recupera i dati inviati tramite il modulo
    $indirizzo = $_POST['indirizzo'] ?? '';
    if (!empty($indirizzo) && !isValidString($indirizzo)) {
        $errors[]="L'indirizzo contiene caratteri non validi.";
    }
    $email = $_POST['email'] ?? '';
    if (!empty($email) && !isValidEmail($email)) {
        $errors[]="L'email non è valida.";
    }
    $nuova_password = $_POST['nuova_password'] ?? '';
    $conferma_password = $_POST['conferma_password'] ?? '';
    $vecchia_password = $_POST['vecchia_password'] ?? '';

    if ((!empty($nuova_password) && !isValidString($nuova_password)) || 
    (!empty($conferma_password) && !isValidString($conferma_password)) ||
    (!empty($vecchia_password) && !isValidString($vecchia_password))) {
        $errors[] = "La password contiene caratteri non validi.";
    }

    if (!empty($nuova_password) || !empty($conferma_password) || !empty($vecchia_password)) {
        if (empty($vecchia_password)) {
            $errors[]="La vecchia password è richiesta per cambiare la password.";
        }
        
        if (!$dbOperation->verifyOldPassword($username, $vecchia_password)) {
            $errors[]="La vecchia password non è corretta.";
        }
        if (empty($conferma_password)){
            $errors[]= "Conferma password richiesta";
        }
        if ($nuova_password !== $conferma_password) {
            $errors[]="Le password non coincidono";
        }
        if(empty($nuova_password)){
            $errors[]= "Richiesta nuova password";
        }

        // Aggiorna la password nel database solo se è stata fornita una nuova password
        if (!empty($nuova_password)) {
            $dbOperation->updatePassword($username, $nuova_password);
        }
    }
    

    // Aggiorna gli altri dati nel database solo se non sono vuoti
    if (!empty($indirizzo) && empty($errors)) {
        $dbOperation->updateIndirizzo($username, $indirizzo);
    }

    if (!empty($email) && empty($errors)) {
        $dbOperation->updateEmail($username, $email);
    }
    if (!empty($errors)) {
        
        $_SESSION['update_form_errors'] = $errors;
        header("Location: ../account.php");
        die();
    }else{
        header("Location: ../account.php"); 
        die();
    }

    
} else {
    
    die("Richiesta non valida.");
}


?>