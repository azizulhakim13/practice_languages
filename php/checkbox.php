<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="checkbox.php" method="post">
        <input type="checkbox" name="pizza" value="Pizza">Pizza <br>
        <input type="checkbox" name="hamburger" value="Hamburger">Hamburger <br>
        <input type="checkbox" name="hotdog" value="Hotdog">Hotdog <br>
        <input type="checkbox" name="taco" value="Taco">Taco <br><br>
        <input type="submit" name="submit" value="Submit">
     </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        if(isset($_POST["pizza"])){
            echo "You Like Pizza! <br>";
        }
        if(isset($_POST["hamburger"])){
            echo "You Like hamburger! <br>";
        }
        if(isset($_POST["hotdog"])){
            echo "You Like hotdog! <br>";
        }
        if(isset($_POST["taco"])){
            echo "You Like taco! <br>";
        }
        if(empty($_POST["pizza"])){
            echo "You don't Like Pizza! <br>";
        }
        if(empty($_POST["hamburger"])){
            echo "You don't Like hamburger! <br>";
        }
        if(empty($_POST["hotdog"])){
            echo "You don't Like hotdog! <br>";
        }
        if(empty($_POST["taco"])){
            echo "You don't Like taco! <br>";
        }
    }
?>