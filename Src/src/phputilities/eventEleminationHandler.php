<?php
include('DBOperation.php');



$dboperation = new DBOperation(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_event'])) {
    $eventId = $_POST['event_artist']; // Adjust this based on your form field names
    $dboperation->deleteEvent($eventId); 
    
    #eliminazione del file dalla cartella ../assets/artisti/
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg'];

    // dato che so solo il nome del immagine e non l'estensione mi tocca fare così
    foreach ($allowedExtensions as $extension) {
        $imagePath = "../assets/artisti/" . $eventId . "." . $extension;
        
        #se trova limmagine la elimina
        if (file_exists($imagePath)) {
            
            unlink($imagePath);
            break; #alla prima eliminazione esce dal loop
        }
    }


    header("Location: ../account.php"); 
    die();
    


}
?>
