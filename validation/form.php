<?php 
    // Defining variables and setting to empty
    $fullname = $email = $gender = $comment = $number = $age = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = isset($_POST["name"]) ? test_input($_POST["name"]) : "";
        $email = isset($_POST["email"]) ? test_input($_POST["email"]) : "";
        $number = isset($_POST["number"]) ? test_input($_POST["number"]) : "";
        $comment = isset($_POST["comment"]) ? test_input($_POST["comment"]) : "";
        $gender = isset($_POST["gender"]) ? test_input($_POST["gender"]) : "";
        $age = isset($_POST["age"]) ? test_input($_POST["age"]) : "";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container pt-5">
    <h2>Form Validation</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
            <label>Full Name:</label><br>
            <input type="text" name="name">
        </div>
        <div class="mb-3">
            <label>E-mail:</label><br>
            <input type="text" name="email">
        </div>
        <div class="mb-3">
            <label>Number(Optional):</label><br>
            <input type="text" name="number">
        </div>
        <div class="mb-3">
            <label>Age:</label><br>
            <input type="text" name="age">
        </div>
        <div class="mb-3">
            <label>Comment:</label><br>
            <textarea name="comment" cols="30" rows="7"></textarea>
        </div>
        <div class="mb-3">
            <label>Gender:</label><br>
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="male">Male
        </div>
        <input type="submit" name="click here" value="click here">
    </form>
</div>

<?php
    echo "<h2>Your Input:</h2>";
    echo $fullname . "<br />";
    echo $email . "<br />"; 
    echo $age . "<br />"; 
    echo $number . "<br />"; 
    echo $comment . "<br />";
    echo $gender;
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
