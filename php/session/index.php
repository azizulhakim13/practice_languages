<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <h1>This is the login page.</h1><br>
    <a href="home.php">Go to Homepage</a><br> -->
    <div style="padding: 1rem; border: 1px solid gray;display: inline-flex; margin: 1rem;border-radius: 6px;">
        <form action="index.php" method="post">
            <label>Username:</label><br>
            <input type="text" name="username"><br><br>
            <label>Password:</label><br>
            <input type="password" name="password"><br><br>
            <input type="submit" name="login" value="Login"><br>
        </form>
    </div>
</body>
</html>

<?php
    if(isset($_POST["login"])){
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            
            header("Location: home.php");
        }
        else{
            echo "<br> Missing Username/Password! <br>";
        }
    }
?>