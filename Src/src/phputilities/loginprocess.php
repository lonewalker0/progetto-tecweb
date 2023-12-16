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
            $DBOperation->registerUser($username, $password);
            $_SESSION['username'] = $username;
            header("Location: ../account.php"); 
            die();

        } catch (Exception $e) {
            
            echo "Errore durante la registrazione: " . $e->getMessage();
        }


    } elseif (isset($_POST['accedi'])) {
        try {
            if($DBOperation->loginUser($username, $password)){
            $_SESSION['username'] = $username;
            header("Location: ../account.php"); 
            die();}
            else{
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