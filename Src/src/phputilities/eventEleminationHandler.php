<?php
include('DBOperation.php');



$dboperation = new DBOperation(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_event'])) {
    $eventId = $_POST['event_artist']; // Adjust this based on your form field names
    $dboperation->deleteEvent($eventId); 
    header("Location: ../account.php"); 
    die();
    


}
?>
