<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="operators.php" method="post">
        <label>Expenses:</label>
        <input type="number" name="expense">
        <input type="submit" value="Remaining">
    </form> 
</body>
</html>

<?php
    $salary = 26000;
    $expense = $_POST["expense"];
    $remaining = $salary -$expense;

    if($remaining >= 5000 && !$remaining < 5000 ) {
        echo "You saved a bare minimum";
    }

    else{
        echo "This saving is less than target";
    }
?>