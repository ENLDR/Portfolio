<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Protected Page</title>
</head>
<body>
    <h2>Welcome to the Protected Page</h2>
    <p>You are logged in!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
