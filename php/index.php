<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php
        // Variable
        $name = ' Azizul';
        $age = 25;
        $cgpa = 3.25;
        $wealth = 500;

        $addition = $age * $cgpa;
        echo "Hello {$name}!. <br> you are {$age} years old. <br> Cgpa of your blood is {$cgpa}. <br> Your net worth is \${$wealth} <br> a * b = {$addition}";

        // Arithmetic
        $a = 10;
        $b = 3;
        // $z = $a ** $b;
        $z = $a % $b;

        echo "<br> Z = {$z} <br>";

        // Increment/Decremet
        // $z++;
        $z-=3;
        echo "Z is now {$z} <br  >"
    ?> -->

    <form action="index.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Log in"><br><br>
    </form>
</body>
</html>

<?php 
    echo "{$_POST["username"]} <br>";
    echo "{$_POST["password"]} <br>";
?>