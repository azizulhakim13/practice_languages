<?php
    function intro($name, $age){
        echo "{$name}, You are {$age} Years Old! <br>";
    }

    intro("Azizul", 25);
    intro("Sagar", 21);
?> 

<?php
    function hypotenuse($a, $b){
        $c = sqrt($a ** 2 + $b **2);
        return $c;
    }

    echo "<br>" . hypotenuse(3, 4) . "<br>";
?>

<!-- String Functions -->
<?php
    $username = "Azizul";

    // $username = strtolower($username);
    // $username = strtoupper($username);
    // $username = str_pad($username, 20, "/");
    // $username = strrev($username);
    // $username = str_shuffle($username);
    
    $count = strlen($username);
    echo $count . "<br>";

    $name = "Azizul Hakim";
    $firstname = substr($name, 6, 10);
    echo $firstname . "<br>";

    $index = strpos($username, "i");
    echo $index . "<br>";

    $phone = "123-456-789";
    $phone = str_replace("-", "x", $phone);
    echo "<br> {$phone} <br><br>";
    
    $text = "Lorem ipsum lorem";
    $alltxt = explode(" ", $text);
    foreach($alltxt as $text) {
        echo $text . "<br>";
    }

    $arr = array("Hello", "World");
    $arr = implode("-", $arr);
    echo "<br>" . $arr . "<br>";

    echo "<br> {$username} "; 
?>