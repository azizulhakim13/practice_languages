<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="radio.php" method="post">
        <input type="radio" name="card" value="Visa">Visa<br>
        <input type="radio" name="card" value="Mastercard">Mastercard<br>
        <input type="radio" name="card" value="Express">Express<br><br>
        <input type="submit" name="confirm" value="Confirm">
    </form>
</body>
</html>

<?php
    if(isset($_POST["confirm"])){

        $card = null;

        if(isset($_POST["card"])){
            $card = $_POST["card"];
        }
       
        if($card == "Visa"){
            echo "You selected Visa";
        }
        elseif($card == "Mastercard"){
            echo "You Selected Mastercard";
        }
        elseif($card == "Express"){
            echo "You Selected Express";
        }
        else {
            echo "Please select a option";
        }
    }
?>