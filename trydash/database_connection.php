<?php
$servername = "localhost:3307";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "user_systems"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
