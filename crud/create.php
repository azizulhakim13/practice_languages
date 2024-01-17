<?php
include "config.php";

if (isset($_POST['submit'])) {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$firstname', '$lastname', '$email', '$hashedPassword', '$gender')";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New record added successfully";
    } else {
        echo "Error: " . $sql . "<br />" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        fieldset, legend {
            all: revert;
        }
    </style>
</head>
<body>
    <div class="container pt-5">
        <h2 class="fw-semibold">Signup Form</h2>
        <form class="d-inline-flex" action="" method="POST">
            <fieldset class="p-4">
                <legend>Personal Information:</legend>
                <label>First name:</label><br>
                <input type="text" name="firstname" required><br>

                <label>Last name:</label><br>
                <input type="text" name="lastname" required><br>

                <label>Email:</label><br>
                <input type="email" name="email" required><br>

                <label>Password:</label><br>
                <input type="password" name="password" required><br>

                <label>Gender:</label><br>
                <input type="radio" name="gender" value="Male" required>Male
                <input type="radio" name="gender" value="Female" required>Female
                <br><br>

                <input type="submit" name="submit" value="Submit">
            </fieldset>
        </form>
        <div class="pt-4">
            <a class="btn btn-outline-info" href="view.php">Check Users</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
