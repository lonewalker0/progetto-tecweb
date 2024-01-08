<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('DBOperation.php');
include('validationElement.php'); 


session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = "";

    if (!isValidString($_POST['username']) or !isValidString($_POST['password'])) {
        $errors = "<p>Non è accettato codice html!</p>";
    }
    if (!empty($errors)) {
        
        
        $_SESSION['add_login_form_errors'] = $errors;
        header("Location: ../account.php");
        die();
    }else{

    $username = $_POST['username'];
    $password = $_POST['password'];

    
    
    $DBOperation = new DBOperation();



    if (isset($_POST['accedi'])) {
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
                $_SESSION['NomeUtente_Error'] = $username;
                header("Location: ../account.php");
                die();
            }
        } catch (Exception $e) {
            echo "Errore durante il login: " . $e->getMessage();
        }

    }
}
    

} 
?>