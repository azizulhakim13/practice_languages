<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'test1') or die("Connection failed: " . mysqli_connect_error());

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['bgroup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $bgroup = $_POST['bgroup'];

        // Check if email or phone already exists
        $checkQuery = "SELECT * FROM `users` WHERE `Email` = '$email' OR `Phone` = '$phone'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $existingUser = mysqli_fetch_assoc($checkResult);
            $existingEmail = $existingUser['Email'];
            $existingPhone = $existingUser['Phone'];

            // User already exists
            echo "User already exists in the database:<br>";
            if ($email == $existingEmail && $phone == $existingPhone) {
                echo "Both email and phone number already exist.";
            } elseif ($email == $existingEmail) {
                echo "Email already exists.";
            } elseif ($phone == $existingPhone) {
                echo "Phone number already exists.";
            }

            // Add a button to go back to the form page
            echo "<br><br><a href='index.php'>Back to Form</a>";
        } else {
            // User does not exist, proceed with insertion
            $sql = "INSERT INTO `users` (`Name`, `Email`, `Phone`, `Blood Group`) VALUES ('$name', '$email', '$phone', '$bgroup')";

            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "Entry Successful";
            } else {
                echo "An Error occurred: " . mysqli_error($conn);
            }
        }
    }
}
?>
