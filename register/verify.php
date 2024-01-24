<?php
session_start();
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) {
    $verificationToken = $_GET['token'];

    // Check if the token exists in the database
    $stmt = $conn->prepare("SELECT id, username FROM users WHERE verification_token = ?");
    $stmt->bind_param("s", $verificationToken);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $username);
        $stmt->fetch();

        // Update the user's account status to "verified"
        $updateStmt = $conn->prepare("UPDATE users SET is_verified = 1 WHERE id = ?");
        $updateStmt->bind_param("i", $userId);
        $updateStmt->execute();
        $updateStmt->close();

        echo "Email verification successful! You can now <a href='login.php'>login</a>.";
    } else {
        echo "Invalid or expired verification token.";
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: index.php'); // Redirect if accessed directly
    exit();
}
?>
