<?php
include('DBOperation.php');
include('validationElement.php');
$dboperation = new DBOperation(); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $errors = [];
    $username = $_SESSION['username'];
    if (!isValidString($_POST['password'])) {
        $errors[] = "Non è accettato codice HTML!";
    }
    if(!isvalidlength($_POST['password'],5,50)){
        $errors[]="Lunghezza password non valida, riprovare";
    }
    $password=$_POST['password'];
    if(!$dboperation->verifyOldPassword($username,$password )) {
        $errors[] = "Password non corretta. Riprovare!";
    }
    
    if (!empty($errors)) {
        
        
        $_SESSION['form_delete_errors'] = $errors;
        header("Location: ../eliminazione.php");
        die();
    }else{
        try{
           $result=$dboperation->deleteUser($username);
           if($result){
            unset($_SESSION["username"]);
            header("Location: ../account.php"); 
            die();
           }else{
            header("Location: ../eliminazione.php"); 
            die();
           }
            


        }catch (Exception $e) {
            
            echo "Errore durante l'eliminazione: " . $e->getMessage();
    }
    }

}

?>