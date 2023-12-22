<?php
include('DBOperation.php');

$dboperation = new DBOperation(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_event'])) {
    $artistName = $_POST['artist_name'];
    $date = $_POST['date'];
    $hour = $_POST['hour'];
    $description = $_POST['description'];

    // Gestisci il caricamento dell'immagine
    $nomeFileImmagine = $_FILES['image']['name'];
    $percorsoTemporaneoImmagine = $_FILES['image']['tmp_name'];
    $percorsoCaricamentoImmagine = "../assets/artisti/" . $artistName . "." . pathinfo($nomeFileImmagine, PATHINFO_EXTENSION);
    $percorsoImmagineDB = "assets/artisti/" . $artistName . "." . pathinfo($nomeFileImmagine, PATHINFO_EXTENSION);

    // Check if the file type is allowed
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'svg'];
    $fileExtension = strtolower(pathinfo($nomeFileImmagine, PATHINFO_EXTENSION));

    if (in_array($fileExtension, $allowedExtensions)) {
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
    } else {
        // Display an error message for disallowed file type
        echo "Invalid file type. Please upload a JPG, JPEG, PNG, or SVG file.";
    }
}
?>
