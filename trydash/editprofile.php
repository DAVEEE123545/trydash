<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
        }

        .profile-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 10px;
        }

        .profile-container img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .profile-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .profile-container button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .profile-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <h2>Edit Profile</h2>
        <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
            <!-- Profile Picture -->
            <label for="profile_pic">Profile Picture:</label><br>
            <img src="path_to_current_profile_pic.jpg" alt="Profile Picture" id="profilePicPreview"><br><br>
            <input type="file" name="profile_pic" id="profilePicInput" accept="image/*"><br><br>

            <!-- Full Name -->
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" required><br>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br>

            <!-- Username -->
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>

            <!-- Password -->
            <label for="password">New Password:</label>
            <input type="password" name="password" id="password"><br>

            <!-- Confirm Password -->
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" name="confirm_password" id="confirm_password"><br><br>

            <!-- Submit Button -->
            <button type="submit">Save Changes</button>
        </form>
    </div>

    <script>
        // Preview selected profile picture
        document.getElementById("profilePicInput").addEventListener("change", function(){
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profilePicPreview").src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>
</html>
