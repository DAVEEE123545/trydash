<?php
session_start(); // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', '', 'your_database_name'); // Update with your credentials

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in. Please log in to update your profile.");
}

// Variables for storing user inputs
$userId = $_SESSION['user_id'];
$fullName = $_POST['full_name']; // Assuming these inputs are from a form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password']; // Hash the password before saving it
$profileImage = $_FILES['profile_image'];

// Image upload logic
if ($profileImage['error'] == UPLOAD_ERR_OK) {
    $targetDir = "uploads/"; // Directory for storing images
    $fileName = basename($profileImage["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Move uploaded file to target directory
    if (move_uploaded_file($profileImage["tmp_name"], $targetFilePath)) {
        // Prepare update statement
        $stmt = $conn->prepare("UPDATE users SET full_name = ?, username = ?, email = ?, password = ?, profile_image = ? WHERE user_id = ?");
        // Hash the password before saving
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sssssi", $fullName, $username, $email, $hashedPassword, $fileName, $userId);
        
        if ($stmt->execute()) {
            // Success: Redirect to dashboard
            header("Location: dashboard.php"); // Adjust the path to your dashboard page
            exit(); // Always use exit after header redirection
        } else {
            echo "Error updating profile: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded or there was an upload error.";
}

// Close database connection
$conn->close();
?>
