<?php
require_once 'DBOperation.php';
include('validationElement.php'); 

session_start();
$dbOperation = new DBOperation();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se l'utente è autenticato
    $errors=[];
    
    $username = $_SESSION["username"];

    // Recupera i dati inviati tramite il modulo
    $indirizzo = $_POST['indirizzo'] ?? '';
    if (!empty($indirizzo)) {
        if (!isValidString($indirizzo)) {
            $errors[] = "Non è accettato codice HTML";
        } elseif (!isvalidlength($indirizzo, 5, 80)) {
            $errors[] = "Lunghezza campo indirizzo non valida!";
        } elseif (!isValidAddressFormat($indirizzo)) {
            $errors[] = "Deve iniziare con via o piazza, inserisci numero civico e città separato da virgola";
        } else {
            $dbOperation->updateIndirizzo($username, $indirizzo);
        }
    }
    $email = $_POST['email'] ?? '';
    if (!empty($email) && !isValidEmail($email)) {
        if ($DBOperation->checkIfEmailExists($email)) {
            $errors[] = "L'email scelta '$email' è già registrata nel database.";}
        $errors[]="L'email non è valida.";
    }else{
        if(!empty($email)){
            $dbOperation->updateEmail($username, $email);
        }
        
    }
    $nuova_password = $_POST['nuova_password'] ?? '';
    $conferma_password = $_POST['conferma_password'] ?? '';
    $vecchia_password = $_POST['vecchia_password'] ?? '';

    if ((!empty($nuova_password) && !isValidString($nuova_password)) || 
    (!empty($conferma_password) && !isValidString($conferma_password)) ||
    (!empty($vecchia_password) && !isValidString($vecchia_password))) {
        $errors[] = "Non è accettato codice HTML!";
    }
    if ((!empty($nuova_password) && !isvalidlength($nuova_password,5,50)) || 
    (!empty($conferma_password) && !isvalidlength($conferma_password,5,50)) ||
    (!empty($vecchia_password) && !isvalidlength($vecchia_password,5,50))) {
        $errors[] = "Lunghezza della password non valida minimo 5!";
    }
    #se almeno un dato non è presente controlla qual'è
    if (!empty($nuova_password) || !empty($conferma_password) || !empty($vecchia_password)) {
        if (empty($vecchia_password)) {
            $errors[]="La vecchia password è richiesta per cambiare la password!";
        }
        if (!$dbOperation->verifyOldPassword($username, $vecchia_password)) {
            $errors[]="La vecchia password non è corretta!";
        }
        if (empty($conferma_password)){
            $errors[]= "Conferma password richiesta!";
        }
        if ($nuova_password !== $conferma_password) {
            $errors[]="Le password non coincidono!";
        }
        if(empty($nuova_password)){
            $errors[]= "Richiesta nuova password!";
        }
        if (!empty($nuova_password)) {
            $dbOperation->updatePassword($username, $nuova_password);
        }
    }
       

    // Controlla se ci sono stati aggiornamenti e reindirizza di conseguenza
    if (!empty($errors)) {
        $_SESSION['update_form_errors'] = $errors;
        header("Location: ../account.php");
        die();
    } else {
        header("Location: ../account.php");
        die();
        
    }
    
}


?>