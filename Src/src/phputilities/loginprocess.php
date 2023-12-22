<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('DBOperation.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = DBOperation::sanitizeInput($_POST['username']);
    $password = DBOperation::sanitizeInput($_POST['password']);

    
    #$dbAccess = new DBAccess();
    $DBOperation = new DBOperation();

    if (isset($_POST['registrati'])) {
            try {
                $nome = DBOperation::sanitizeInput($_POST['nome']);
                $cognome = DBOperation::sanitizeInput($_POST['cognome']);
                $eta = DBOperation::sanitizeInput($_POST['eta']);
                $indirizzo = DBOperation::sanitizeInput($_POST['indirizzo']);
                $email = DBOperation::sanitizeInput($_POST['email']);
                

                $result = $DBOperation->registerUser($username, $password, $nome, $cognome, $eta, $indirizzo, $email);
            
            if($result){
                $_SESSION['username'] = $username;
                $_SESSION['is_admin'] = false; #solo i non admin si possono registrare
                header("Location: ../account.php"); 
                die();}
            else{
                header("Location: ../account.php"); 
                die();}
            

        } catch (Exception $e) {
            
            echo "Errore durante la registrazione: " . $e->getMessage();
        }


    } elseif (isset($_POST['accedi'])) {
        try {

            $isUserLoggedIn = $DBOperation->loginUser($username, $password);
    
            if ($isUserLoggedIn) {
                $_SESSION['username'] = $username;
                $isUserAdmin = $DBOperation->isAdmin($username); 
                if ($isUserAdmin) {
                    $_SESSION['is_admin'] = true;
                } else {
                    $_SESSION['is_admin'] = false;
                }
                header("Location: ../account.php");
                die();
            } else {

                #qui è da cambiare e bisogna andare a mostrare l'errore in qualche modo, adesso c'è da capire come fare. 
                #Non basta rimandare all'index, bisogna rimandare a account.php con qualche dato in più tipo dati non validi
                // Credenziali errate, imposta un messaggio di errore
                
                $_SESSION['login_error'] = true;
                header("Location: ../account.php");
                die();
            }
        } catch (Exception $e) {
            echo "Errore durante il login: " . $e->getMessage();
        }
    }

    else {
        
        echo "Azione non supportata.";
    }

    
} 
?>