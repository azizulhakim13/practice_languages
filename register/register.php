<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Validate username format
    if (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $username)) {
        echo "Invalid username format. Must be 4-20 characters, alphanumeric or underscore.";
    } else {
        // Check if the username already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Username already exists. Choose a different username.";
        } else {
            // Validate password format
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
                echo "Invalid password format. Must be at least 8 characters, including uppercase, lowercase, and a number.";
            } else {
                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Invalid email format.";
                } else {
                    // Validate phone format (simple validation, can be improved based on requirements)
                    if (!preg_match("/^\d{10,15}$/", $phone)) {
                        echo "Invalid phone number format. Must be 10-15 digits.";
                    } else {
                        // Hash the password and insert into the database
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $conn->prepare("INSERT INTO users (username, password, email, phone) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $username, $hashedPassword, $email, $phone);
                        $stmt->execute();

                        echo "Registration successful! <a href='login.php'>Login</a>";
                    }
                }
            }
        }

        $stmt->close();
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-5">
        <div class="py-3 px-4 shadow d-inline-flex flex-column rounded-4">
            <h2 class="display-6 fw-medium mb-4">Sign Up</h2>

            <form action="register.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Username: </label><br>
                    <input type="text" name="username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email: </label><br>
                    <input type="text" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone: </label><br>
                    <input type="text" name="phone" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password: </label><br>
                    <input type="password" name="password" required>
                </div>
                <input type="submit" class="btn btn-dark d-block w-100" value="Register">
                <p>Already Registered?<span class="ps-3"><a href="login.php">Sign in</a></span></p>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<!-- Retrieves user input from the registration form ($_POST).
Validates the username, password, email, and phone number formats using regular expressions.
Checks if the username already exists in the database.
If validation is successful, hashes the password using password_hash and inserts the user data into the database. -->