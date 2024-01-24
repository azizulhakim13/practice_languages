<?php
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['username'])){
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
</head>
<body>
    <div class="container pt-5">
        <h1>Hello <?php echo $_SESSION['username']; ?></h1>
        <a href="logout.php">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</body>
</html>

    <?php
}
else {
    header("Location: index.php");
    exit();
}
?>


<!-- This script checks if the user is logged in by verifying the existence of session variables.
    If logged in, it displays the home page content.
    If not logged in, it redirects to the login page (index.php). -->