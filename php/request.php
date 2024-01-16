<?php
if (isset($_REQUEST["name"]) || isset($_POST["age"])) {
    echo "Hi " . $_REQUEST['name'] . "<br />";
    echo "Your age is " . $_REQUEST['age'] . "Years";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php $_PHP_SELF?>" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" /><br><br>
        <label>Age:</label><br>
        <input type="text" name="age"><br><br>
        <input type="submit">
    </form>
</body>
</html>