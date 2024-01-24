<?php
session_start();
session_destroy();
header('Location: index.php');
exit();
?>

<!-- Calls session_start() to start the session.
Destroys the session using session_destroy().
Redirects the user to index.php. -->