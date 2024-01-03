<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="isset.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" name="login" value="Log In">
    </form>
</body>
</html>

<?php
    // foreach($_POST as $key => $value){
    //     echo "{$key} = {$value} <br>";
    // }

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($username)) {
            echo "Username is missing";
        }
        elseif(empty($password)){
            echo "Password is missing";
        }
        else{
            echo "Hello {$username}";
        }
    }
?>

<?php
    $username2 = "Azizul";

    // echo isset($username);
    // echo empty($username);

    if(isset($username2)) {
        echo "<br><br><br> The variable is set";
    }

    else {
        echo "The variable is not set";
    }
?>

<!-- isset() Returns TRUE if a variable is declared and not null -->
<!-- empty() returns True if a variable is not declared, false, null  -->