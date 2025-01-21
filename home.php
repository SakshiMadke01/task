<?php
session_start();
include 'static_values.php';

if (!isset($_SESSION['username']) && !isset($_COOKIE['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'] ?? $_COOKIE['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header id="head">
         <h2>Welcome, <?php echo htmlspecialchars($username); ?>!
         <a href="logout.php" id="out">Logout</a> </h2>
    </header>

</body>
</html>
