<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    // Validate input (you can add more validation if needed)
    if (empty($uname) || empty($pass)) {
        header("Location: index.php?error=Username and password are required");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $uname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();

            // Verify password using password_verify
            if (password_verify($pass, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                header("Location: home.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect password");
                exit();
            }
        } else {
            header("Location: index.php?error=User not found");
            exit();
        }
    } else {
        header("Location: index.php?error=Database error");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>



<!-- This script handles the user login.
    It checks if the request method is POST (form submission).
    It retrieves the username and password from the form.
    Validates that both fields are filled; otherwise, it redirects with an error message.
    Executes a SQL query to check if the provided username and password match any records in the database.
    If successful, it sets session variables, redirects to the home page (home.php).
    If unsuccessful, it redirects to the login page (index.php) with an error message. -->