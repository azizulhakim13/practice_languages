<?php
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'form';

    $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

    if(mysqli_connect_error()){
        exit("Error connecting to the database" . mysqli_connect_error());
    }

    if(!isset($_POST['username'], $_POST['password'], $_POST['email'])){
        exit("Empty Fields");
    }

    if(empty($_POST['username'] || empty($_POST['password']) || empty($_POST['email']))){
        exit("Values are empty");
    }

    if($stmt = $conn->prepare('select id, password from users where username = ?')){
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0) {
            echo 'Username already exists, try again <br />';
            echo '<a href="register.html">Go Back</a>';
        }
        else {
            if($stmt = $conn->prepare('insert into users(username, password, email) values (?, ?, ?)')){
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
                $stmt->execute();
                echo "Successfully registered! <br />";
                echo '<a href="register.html">Go Back</a>';
            }
            else {
                echo "Error Occurred";
            }
        }
        $stmt->close();
    }
    else {
        echo "Error Occurred!";
    }
    $conn->close();
?>