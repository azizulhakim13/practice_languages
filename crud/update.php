<?php
    include "config.php";

    // Function to sanitize input data
    function sanitize($input) {
        return htmlspecialchars(strip_tags($input));
    }

    if(isset($_POST['update'])){
        // Sanitize user input to prevent SQL injection
        $firstname = sanitize($_POST['firstname']);
        $user_id = $_POST['id'];
        $lastname = sanitize($_POST['lastname']);
        $email = sanitize($_POST['email']);
        $gender = sanitize($_POST['gender']);
        $password = sanitize($_POST['password']);
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("UPDATE `users` SET `firstname` = ?, `lastname` = ?, `email` = ?, `password` = ?, `gender` = ? WHERE `id` = ?");
        $stmt->bind_param("sssssi", $firstname, $lastname, $email, $hashedPassword, $gender, $user_id);

        if($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        echo "<br><br><a href='view.php'>Go Back</a>";
        $stmt->close();
    }

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM `users` WHERE `id` = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows) {
            while($row = $result->fetch_assoc()){
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];
                $id = $row['id'];
            }

            ?>

            <h2>User Update Form</h2>
            <form action="" method="post" style="display: inline-flex;">
                <fieldset style="padding: 1.5rem;">
                    <legend>Personal Information:</legend>
                    <label>First name:</label><br>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>

                    <label>Last name:</label><br>
                    <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>

                    <label>Email:</label><br>
                    <input type="text" name="email" value="<?php echo $email; ?>"><br><br>

                    <label>Password:</label><br>
                    <input type="password" name="password" value="<?php echo $password; ?>"><br><br>

                    <label>Gender:</label><br>
                    <input type="radio" name="gender" value="Male" <?php echo ($gender == 'Male') ? "checked" : ""; ?>>Male
                    <input type="radio" name="gender" value="Female" <?php echo ($gender == 'Female') ? "checked" : ""; ?>>Female
                    <br><br>

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="update" value="Update">
                </fieldset>
            </form>

        <?php
        } else {
            header("Location: view.php");
        }

        $stmt->close();
    }
?>
