<?php
include('DBOperation.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dboperation = new DBOperation(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_event'])) {
    $artistName = filter_var($_POST['artist_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = filter_var($_POST['date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $hour = filter_var($_POST['hour'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = strip_tags($_POST['description'], '<br>');
    #faccio solo il sanitize per questa cosa.


    session_start(); 
    $maxFileSize = 1000 * 1024; // 500KB in bytes
    if ($_FILES['image']['size'] > $maxFileSize) {
        $_SESSION['error'] = "L'immagine è troppo larga";
        header("Location: ../account.php");
        die();}

    $nomeFileImmagine = $_FILES['image']['name'];
    $percorsoTemporaneoImmagine = $_FILES['image']['tmp_name']; 

    $percorsoCaricamentoImmagine = "../assets/artisti/" . $artistName . "." . pathinfo($nomeFileImmagine, PATHINFO_EXTENSION);
    $percorsoImmagineDB = "assets/artisti/" . $artistName . "." . pathinfo($nomeFileImmagine, PATHINFO_EXTENSION);

    // Controllo se il tipo è ammesso
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