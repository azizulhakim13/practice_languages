<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="array.php" method="post">
        <label>Enter a country:</label>
        <input type="text" name="country">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    for($i = 0; $i < 5; $i++){
        echo "<br>";
    }
    $foods = array("Apple", "Banana", "Coconut");

    $foods[0] = "Mango";
    array_push($foods, "Papaya", "Litchy");
    array_pop($foods);
    array_shift($foods); 

    // echo $foods[0] . "<br>";
    foreach($foods as $food){
        echo $food . "<br>";
    }

    echo "<br>" . count($foods) . "<br><br>";

    $foods = array_reverse($foods);

    foreach($foods as $food) {
        echo $food . "<br>";
    }
?>

<!-- Associative array -->
<?php
    $capitals = array("USA" => "Washington D.C",
                        "Japan" => "Tokyo",
                        "Bangladesh" => "Dhaka");

    $capital = $capitals[$_POST["country"]];
    echo "<br> {$capital}";
    
    // echo "<br>" . $capitals["Japan"];
    // $capitals["USA"] = "Las Vegas";
    // $capitals["China"] = "Beijing";
    // array_pop($capitals);
    // array_shift($capitals);
    // $capitals = array_reverse($capitals);
    // echo count($capitals);

    foreach($capitals as $key => $value) {
        echo "<br> {$key}: {$value}";
    }

    echo "<br>";

    $keys = array_keys($capitals);

    foreach($keys as $key){
        echo "<br> {$key}";
    }

    echo "<br>";

    $values = array_values($capitals);
    foreach($values as $value){
        echo "<br> {$value}";
    }
?>