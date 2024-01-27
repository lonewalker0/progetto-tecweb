<?php
include('DBOperation.php');
include('validationElement.php');
session_start();

$dboperation=new DBOperation();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        
        if (isset($_SESSION['is_admin'])){//ci dice se l'utente è loggato
            if ($_SESSION['is_admin']===true) {//se è admin
            $_SESSION['purchase_result'] = "<p>Sei loggato come admin, acquisto negato!</p>"; 
            header("Location: ../prevendite.php"); 
            die(); }}
        else{//l'utente non è loggato
            $_SESSION['purchase_result'] = "<p>Per procedere all'acquisto dei biglietti, si prega di autenticarsi. <a href='account.php' tabindex=0>Accedi</a></p>";
            header("Location: ../prevendite.php"); 
            die();}
        
        // Recupera i dati dal modulo
        
        $username = $_SESSION['username']; 
        $productId = $_POST['id']; 
        $quantity = $_POST['quantita']; // Assicura che il campo quantita sia presente nel tuo modulo
        $purchaseDate = date("Y-m-d H:i:s"); // Imposta la data di acquisto come data corrente
        $prezzosingolo=$dboperation->getPrezzoBiglietto($productId);
        $prezzo_totale= $quantity * $prezzosingolo;

        if(!verificaValore($quantity)){
            $errors= "<p>Puoi acquistare al massimo 5 biglietti alla volta!</p>";
            $_SESSION['purchase_result']=$errors;
            header("Location: ../prevendite.php");
            die();
        }else{

            // Aggiungi l'ordine nel database
            $success = $dboperation->addOrder($username, $productId, $purchaseDate, $quantity,$prezzo_totale);

            if ($success) {
                $_SESSION['purchase_result'] = "<p>Acquisto avvenuto con successo!</p>";
                header("Location: ../prevendite.php"); 
                die();
            } else {
                $_SESSION['purchase_result'] = "<p>C'è stato un errore nel processo di acquisto, si prega di riprovare.</p>";
                header("Location: ../prevendite.php"); 
                die();
            }
        }

        

    } catch (Exception $e) {
        echo "Si è verificato un errore generale durante l'elaborazione. Si prega di riprovare.";
    }

} else {
    echo "Metodo non consentito.";
}





?>