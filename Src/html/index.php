<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "db";  // Use the service name as the server name
$username = "root";
$password = "root";
$dbname = "dbtecweb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data
$result = $conn->query("SELECT * FROM users");

// Display the results
echo "<h2>Table Data:</h2>";
echo "<ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>ID: " . $row["username"] . " - passord: " . $row["password"] . "</li>";
}
echo "</ul>";

// Close the connection
$conn->close();
?>
