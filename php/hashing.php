<?php
    $password = "hello123";
    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    if(password_verify("hello123", $hash)){
        echo "You are logged in!";
    }
    else{
        echo "Incorrect Password!";
    }
?>