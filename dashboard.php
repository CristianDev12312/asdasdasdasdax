<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Benvenuto, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>
