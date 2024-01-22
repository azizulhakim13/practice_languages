<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uname = $_POST['uname'];
    $pass = $_POST['password'];

    // Validate input (you can add more validation if needed)
    if (empty($uname) || empty($pass)) {
        header("Location: index.php?error=Username and password are required");
        exit();
    }

    $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];

            header("Location: home.php");
            exit();
        } else {
            header("Location: index.php?error=Incorrect username or password");
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