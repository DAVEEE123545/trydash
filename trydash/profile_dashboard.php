<?php
// profile_dashboard.php

// Database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
$userId = $_SESSION['user_id']; // Assuming you store user ID in session
$result = $conn->query("SELECT * FROM users WHERE id = $userId");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Display profile image
    echo '<img src="' . $user['profile_image'] . '" alt="Profile Picture" class="profile-img">';
    echo '<h3>' . $user['full_name'] . '</h3>';
    echo '<p>@' . $user['username'] . '</p>';
} else {
    echo "No user found.";
}

$conn->close();
?>
