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
    $percorsoCaricamentoImmagine = "../assets/artisti/" . $artistName . ".jpg";
    #da sistemare perchè fnzioni con tutte le immagini non solo jpg

    if (move_uploaded_file($percorsoTemporaneoImmagine, $percorsoCaricamentoImmagine)) {
        if ($dboperation->addEvent($artistName, $date, $hour, $percorsoCaricamentoImmagine, $description)) {
            header("Location: ../account.php"); 
            die();
        } else {
            // Display an error message or redirect to an error page
            echo "Error adding event. Please try again.";
        }
    }
}
?>
