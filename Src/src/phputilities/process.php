<?php

require_once('DBAccess.php');
require_once('DBOperations.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $dbAccess = new DBAccess();
    $dbOperations = new DBOperations($dbAccess);

    if (isset($_POST['registrazione'])) {
        
        try {
            $dbOperations->registerUser($username, $password);
            $_SESSION['username'] = $username;
            echo "Registrazione riuscita! Benvenuto, $username!";
        } catch (Exception $e) {
            
            echo "Errore durante la registrazione: " . $e->getMessage();
        }
    } elseif (isset($_POST['accesso'])) {
        
        try {
            $dbOperations->loginUser($username, $password);
            $_SESSION['username'] = $username;
            echo "Accesso riuscito! Benvenuto, $username!";
        } catch (Exception $e) {
            // Gestisci gli errori
            echo "Errore durante il login: " . $e->getMessage();
        }
    } else {
        
        echo "Azione non supportata.";
    }

    
}
?>