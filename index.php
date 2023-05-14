<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<center>
    <h1>Home</h1>
    <?php if (isset($_SESSION["user_id"])): ?>
        <?php
        $db = require __DIR__ . "/db_connection.php";
        $sql = sprintf("SELECT * FROM user WHERE ID = '%s'", $db->real_escape_string($_SESSION["user_id"]));
        $result = $db->query($sql);
        $user = $result->fetch_assoc(); ?>
        <p>You are logged as <?php echo $user["Name"]; echo " " . $user["Surname"]?></p>
        <p><a href="logout.php">Logout</a></p>
    <?php else: ?>
        <p>Not logged in</p>
        <p><a href="login.php">Login</a>   <a href="signup.php">Signup</a> </p>
    <?php endif; ?>
</center>
</body>
</html>
