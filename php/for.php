<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="for.php" method="post">
        <label>Enter a number to count down:</label>
        <input type="number" name="counter">
        <input type="submit" value="start"><br><br><br>
    </form>

    <form action="for.php" method="post">
        <label>Enter a number to count down:</label>
        <input type="number" name="count">
        <input type="submit" value="Count"><br><br><br>
    </form>
</body>
</html>

<?php
    $counter = $_POST["counter"];

    for($i = $counter; $i > 0; $i--){
        echo "Counted {$i} <br>";
    }
?>

<?php
    $base = $_POST["count"];

    for ($i = 1; $i <= 10; $i++) {
        $result = $base * $i;
        echo "$base * $i = $result <br>" . PHP_EOL;
    }
?>