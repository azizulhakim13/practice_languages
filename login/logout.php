<?php 
    session_start();

    session_unset();
    session_destroy();

    header("Location: index.php");


//     This code logs the user out.
//      session_start initiates the session.
//      session_unset removes all session variables.
//      session_destroy destroys the session.
//      Finally, it redirects the user to the login page (index.php).