<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username format
    if (!preg_match("/^[a-zA-Z0-9_]{4,20}$/", $username)) {
        echo "Invalid username format. Must be 4-20 characters, alphanumeric or underscore.";
    } else {
        // Check if the username exists
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashedPassword);
            $stmt->fetch();

            // Validate password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header('Location: home.php');
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "Username not found";
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
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-5">
        <div class="py-3 px-4 shadow d-inline-flex flex-column rounded-4">
            <h2 class="display-6 fw-medium mb-4">User Login</h2>

            <form action="login.php" method="post">
                <div class="mb-3">
                    <label>Username: </label><br>
                    <input type="text" name="username" required>
                </div>
                <div class="mb-4">
                    <label>Password: </label><br>
                    <input type="password" name="password" required>
                </div>
                <input type="submit" class="btn btn-dark d-block w-100" value="Login">
                <p>No Account?<span class="ps-3"><a href="register.php">Sign up</a></span></p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<!-- Retrieves user input from the login form ($_POST).
Validates the username format using a regular expression.
Checks if the username exists in the database.
If the username exists, fetches the hashed password from the database and verifies it using password_verify.
If login is successful, sets session variables and redirects the user to home.php. -->
