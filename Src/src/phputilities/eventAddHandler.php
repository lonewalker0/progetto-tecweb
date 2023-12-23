<?php



include('DBOperation.php');
include('validationElement.php'); 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dboperation = new DBOperation(); 
#if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['artist_name'])) {
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $errors = [];
    $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];

    $maxFileSize = 1000 * 1024; 
    if ($_FILES['image']['size'] > $maxFileSize) {
        $errors[] = "L'immagine è troppo grande. Inserisci immagine di dimensione inferiore a 1 MB.";
    }
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = "Errore nel caricamento dell'immagine.";
    }
    if (!isValidString($_POST['artist_name']) or !isValidString($_POST['description'])) {
        $errors[] = "Non sono accettati caratteri speciali!";
    }
    if (!isValidHour($_POST['hour'])) {
        $errors[] = "Orario inserito non valido!";
    }
    if (!isValidDate($_POST['date'])) {
        $errors[] = "Data inserita non valida!";
    }
    if (!in_array($_FILES['image']['type'], $allowedFileTypes)) {
        $errors[] = "Tipo di file non supportato. Inserisci un'immagine JPEG, PNG o GIF.";
    }

    
    if (!empty($errors)) {
        #se ci sono errori voglio rimandare alla pagina sia gli errori che i post attuali in maniera tale da ricostruire il form
        $_SESSION['add_event_form_data'] = $_POST;
        $_SESSION['add_event_form_errors'] = $errors;
        header("Location: ../account.php");
        die();
    }
    else {

        $artistName = $_POST['artist_name'];
        $date = $_POST['date'];
        $hour = $_POST['hour'];
        $description = $_POST['description']; 
        $nomeFileImmagine = $_FILES['image']['name'];
        $percorsoTemporaneoImmagine = $_FILES['image']['tmp_name']; 

        $percorsoCaricamentoImmagine = "../assets/artisti/" . $artistName . "." . pathinfo($nomeFileImmagine, PATHINFO_EXTENSION);
        $percorsoImmagineDB = "assets/artisti/" . $artistName . "." . pathinfo($nomeFileImmagine, PATHINFO_EXTENSION);

        // Controllo se il tipo è ammesso
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg'];
        $fileExtension = strtolower(pathinfo($nomeFileImmagine, PATHINFO_EXTENSION));

        
        if (move_uploaded_file($percorsoTemporaneoImmagine, $percorsoCaricamentoImmagine)) {
            if ($dboperation->addEvent($artistName, $date, $hour, $percorsoImmagineDB, $description)) {
                header("Location: ../account.php"); 
                die();
            } else {
                // Display an error message or redirect to an error page
                echo "Error adding event. Please try again.";
            }
        } else {
            // Display an error message for file upload failure
            echo "Error uploading file. Please try again.";
        }
        
    }
}
?>