<?php
    $sname = "localhost";
    $uname = "root";
    $password = "";

    $db_name = "form";

    $conn = mysqli_connect($sname, $uname, $password, $db_name);

    if(!$conn){
        echo "Connection Failed";
    }
?>


<!-- 
    This code connects to the MySQL database using the mysqli_connect function.

    You specified the server name, username, password, and database name.

    If the connection fails, it echoes "Connection Failed." -->