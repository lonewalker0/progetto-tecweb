<?php
include('DBOperation.php');
session_start();

$dboperation=new DBOperation();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        
        if ($_SESSION['is_admin']) {
           echo "Gli amministratori non possono acquistare i biglietti.";
            die();
        }
        // Recupera i dati dal modulo
        $username = $_SESSION['username']; 
        $productId = $_GET["id"]; 
        $quantity = $_POST['quantita']; // Assicura che il campo quantita sia presente nel tuo modulo
        $purchaseDate = date("Y-m-d H:i:s"); // Imposta la data di acquisto come data corrente
        $prezzosingolo=$dboperation->getPrezzoBiglietto($productId);
        $prezzo_totale= $quantity * $prezzosingolo;
        

        

            // Aggiungi l'ordine nel database
            $success = $dboperation->addOrder($username, $productId, $purchaseDate, $quantity,$prezzo_totale);

            if ($success) {
                header("Location: ../conferma_acquisto.html"); 
                die();
            } else {
                echo "Errore durante l'acquisto. Si prega di riprovare.";
            }

        

    } catch (Exception $e) {
        // Gestisci eccezioni globali qui se necessario
        echo "Si è verificato un errore generale durante l'elaborazione. Si prega di riprovare.";
    }

} else {
    echo "Metodo non consentito.";
}





?>