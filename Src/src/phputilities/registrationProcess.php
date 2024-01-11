<?php


include('DBOperation.php');
include('validationElement.php'); 

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DBOperation = new DBOperation();

    $errors = [];
    
    if (!isValidString($_POST['nome'],2,30) or !isValidString($_POST['cognome'],2,30)
         or !isValidString($_POST['indirizzo'],2,75) or !isValidString($_POST['username'],4,25)
        or !isValidString($_POST['password'],4,50) or !isValidString($_POST['confermaPassword'],4,50)) {
        $errors[] = "Non è accettato codice HTML o lunghezza stringa non valida!";
    }
    if(!isValidEmail($_POST['email'])) {
        $errors[] = "Formato email non valido!";
    }
    if(!isValidAge($_POST['dataNascita'])){
        $errors[] = "Devi avere almeno 16 per registrarti!";
    }
    if ($_POST['password'] !== $_POST['confermaPassword']) {
        $errors[] = "Le password non coincidono!";
    }
    
    $username = $_POST['username'];
    if ($DBOperation->checkIfUserExists($username)) {
        $errors[] = "L'username scelto '$username' è già registrato nel database.";}
    $email = $_POST['email'];
    if ($DBOperation->checkIfEmailExists($email)) {
        $errors[] = "L'email scelta '$email' è già registrata nel database.";}

    
    if (!empty($errors)) {
        #se ci sono errori voglio rimandare alla pagina sia gli errori che i post attuali in maniera tale da ricostruire il form
        $_SESSION['add_register_form_data'] = $_POST;
        $_SESSION['add_register_form_errors'] = $errors;
        header("Location: ../register.php");
        die();
    }
    else {
        
            try {
                $username = $_POST['username'];
                $nome = $_POST['nome'];
                $cognome = $_POST['cognome'];
                $eta = $_POST['dataNascita']; 
                $indirizzo = $_POST['indirizzo']; 
                $email = $_POST['email'];  
                $password = $_POST['password']; 
                $confermapassword = $_POST['confermaPassword']; 

                $result = $DBOperation->registerUser($username, $password, $nome, $cognome, $eta, $indirizzo, $email);
                //mettere variabili di sessione in caso di errori
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
    }

}

?>