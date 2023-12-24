<?php
include('DBOperation.php');
session_start();

$dboperation=new DBOperation();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
        

        // Recupera i dati dal modulo
        $username = $_SESSION['username']; 
        $ticketId = $_POST['biglietto'. $_POST['id']]; // Assicura che il campo biglietto sia presente nel tuo modulo
        $quantity = $_POST['quantita']; // Assicura che il campo quantita sia presente nel tuo modulo
        $purchaseDate = date("Y-m-d H:i:s"); // Imposta la data di acquisto come data corrente

        

        

            // Aggiungi l'ordine nel database
            $success = $dboperation->addOrder($username, $ticketId, $purchaseDate, $quantity,$prezzo);

            if ($success) {
                echo "Acquisto completato con successo!";
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