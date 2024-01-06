<?php


include('DBOperation.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = ($_POST['password']);

    
    #$dbAccess = new DBAccess();
    $DBOperation = new DBOperation();

    if (isset($_POST['registrati'])) {
            try {
                $nome = ($_POST['nome']);
                $cognome = ($_POST['cognome']);
                $eta = ($_POST['eta']);
                $indirizzo = ($_POST['indirizzo']);
                $email = ($_POST['email']);

                $result = $DBOperation->registerUser($username, $password, $nome, $cognome, $eta, $indirizzo, $email);
             //mettere variabili di sessione in caso di errori + quella generale di errore per capire se ce ne sono
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
        }}
}