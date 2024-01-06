<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="validate.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="user"><br><br>
        <label>Age:</label><br>
        <input type="text" name="age"><br><br>
        <label>Email:</label><br>
        <input type="text" name="email"><br><br>
        <input type="submit" name="login" value="login">
    </form>

</body>
</html>

<?php
    // if(isset($_POST["login"])){
    //     $name = $_POST["user"];
    //     echo "Hello {$name}";
    // }

    // ****  Sanitization  ****
    // if(isset($_POST["login"])){
    //     $name = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
    //     $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
    //     $mail = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    //     echo "Hello {$name}, <br> you are {$age} years old! <br> Your mail is: {$mail}";
    // }

    // ****  validation  ****
    if(isset($_POST["login"])){
        $age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

        if(empty($age)){
            echo "That number is not valid! <br>";
        }

        else{
            echo "You are {$age} years old <br>";
        }

        if(empty($email)){
            echo "This is not a valid email <br>";
        }
        else{
            echo "Your email is: {$email}";
        }
    }
?>