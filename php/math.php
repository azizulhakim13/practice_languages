<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="math.php" method="post">
        <h1>Form</h1>
        <label>Radius:</label>
        <input type="text" name="radius">
        <input type="submit" value="calculate">
    </form>
</body>
</html>

<?php
    $radius = $_POST["radius"];
    $circumference = 2 * pi() * $radius;
    $circumference = round($circumference, 2);

    $area = pi() * pow($radius, 2);
    $area = round($area, 2);
    
    $volume = 4/3 * pi() * pow($radius, 3); 
    $volume = round($volume, 2);

    echo "Circumference = {$circumference} CM <br>";
    echo "Area = {$area} CM^2 <br>";
    echo "Volume = {$volume} CM^3";
?>