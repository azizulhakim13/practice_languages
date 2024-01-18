<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="container pt-5">
    <?php
    // Define variables
    $fullname = $email = $gender = $comment = $number = $age = "";
    
    // Define error variables
    $fullnameErr = $emailErr = $genderErr = $numberErr = $ageErr = $commentErr = "";

    // Function to sanitize and validate input
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Form is submitted via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate Full Name
        if (empty($_POST["name"])) {
            $fullnameErr = "Full Name is required";
        } else {
            $fullname = test_input($_POST["name"]);
        }

        // Validate Email
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // Check if email address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        // Validate Gender
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } 
        else {
            $gender = test_input($_POST["gender"]);
        }

        // Validate Number
        $number = test_input($_POST["number"]);
        if (!empty($number) && !is_numeric($number)) {
            $numberErr = "Invalid number format";
        }

        // Validate Age
        $age = test_input($_POST["age"]);
        if (!empty($age) && !is_numeric($age)) {
            $ageErr = "Invalid age format";
        }

        // Validate Comment
        $comment = test_input($_POST["comment"]);
        // Add additional validation for comments if needed

        // If there are no errors, display the input
        if (empty($fullnameErr) && empty($emailErr) && empty($genderErr) && empty($numberErr) && empty($ageErr) && empty($commentErr)) {
            echo "<h2>Your Input:</h2>";
            echo "Full Name: $fullname<br />";
            echo "Email: $email<br />";
            echo "Gender: $gender<br />";
            echo "Number: $number<br />";
            echo "Age: $age<br />";
            echo "Comment: $comment<br />";
            // Display other fields similarly
        }
    }
    ?>

    <div class="pt-5">
        <h2>Form Validation</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label>Full Name:</label><br>
                <input type="text" name="name">
                <span class="text-danger"><?php echo $fullnameErr; ?></span>
            </div>
            <div class="mb-3">
                <label>E-mail:</label><br>
                <input type="text" name="email">
                <span class="text-danger"><?php echo $emailErr; ?></span>
            </div>
            <div class="mb-3">
                <label>Number(Optional):</label><br>
                <input type="text" name="number">
                <span class="text-danger"><?php echo $numberErr; ?></span>
            </div>
            <div class="mb-3">
                <label>Age:</label><br>
                <input type="text" name="age">
                <span class="text-danger"><?php echo $ageErr; ?></span>
            </div>
            <div class="mb-3">
                <label>Comment:</label><br>
                <textarea name="comment" cols="30" rows="7"></textarea>
                <span class="text-danger"><?php echo $commentErr; ?></span>
            </div>
            <div class="mb-3">
                <label>Gender:</label><br>
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <span class="text-danger"><?php echo $genderErr; ?></span>
            </div>


            <input type="submit" name="click_here" value="Click Here">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
