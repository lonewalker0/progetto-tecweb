<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once('DBOperation.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $dbAccess = new DBAccess();
    $DBOperation = new DBOperation($dbAccess);

    if (isset($_POST['registrati'])) {
            try {
            $result = $DBOperation->registerUser($username, $password);
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
                session_unset();
                session_destroy();
                header("Location: ../index.php");
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