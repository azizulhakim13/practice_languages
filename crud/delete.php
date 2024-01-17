<?php 
    include "config.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        // Use single quotes instead of backticks for values
        $sql = "DELETE FROM `users` WHERE `id` = '$user_id'";

        $result = $conn->query($sql);

        if($result == true){
            echo "Record Deleted successfully";
        }
        else {
            echo "Error: " . $sql . "<br />" .$conn->error;
        }

        echo "<br><br><a href='view.php'>Go Back</a>";
    }
?>
