<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index-2.php" method="post">
        <label>Quantity:</label><br>
        <input type="text" name="quantity">
        <input type="submit" name="total"><br>
    </form>
</body>
</html>

<?php
    $item = 'Pizza';
    $price = 5.99;
    $quantity = $_POST["quantity"];
    $total = $quantity * $price;

    echo "You have ordered {$quantity} * {$item}/s <br>";
    echo "You total is: \${$total}";
?>