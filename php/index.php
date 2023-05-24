<?php
session_start();
$db = require __DIR__ . "/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<script src="../js/includesidebar.js"></script>
<head>
    <style>
        .postbox {
            background-color: #111111;
            border-radius: 25px;
        }
        .textbox {
            background-color: cadetblue;
            border-radius: 25px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<div w3-include-html="sidebar.html"></div>
<center>
    <h1>Home</h1>
    <div class="postbox"><br>
        <?php if (isset($_SESSION["user_id"])): ?>
            <?php
            $sql = sprintf("SELECT * FROM Users WHERE ID = '%s'", $db->real_escape_string($_SESSION["user_id"]));
            $result = $db->query($sql);
            $user = $result->fetch_assoc(); ?>
            <p>You are logged as <?php echo $user["name"]; echo " " . $user["surname"]?></p>
            <p><a href="logout.php">Logout</a></p>
            <a href="createpost.php">Create new post</a><br>
        <?php else: ?>
            <p>Not logged in</p>
            <p><a href="login.php">Login</a>   <a href="../templates/signup.html">Signup</a> </p><br>
        <?php endif; ?>
    </div>
    <br>
        <div class="textbox">
            <br><p>Latests posts</p><br>
        </div>
    <br>
    <?php
    $sql = "SELECT * FROM Blogposts";
    $result = $db->query($sql);

    while ($row = $result->fetch_assoc())
    {
        $sql = sprintf("SELECT * FROM Users WHERE id = '%s'", $db->real_escape_string($row["user_id"]));
        $res = $db->query($sql);
        $user = $res->fetch_assoc();
        ?><div class="postbox"><?php
        echo '<br><p><a href="">' . $user['name'] . " " .$user['surname'] . '</a></p>';
        echo '<p>' . $row['content'] . '</p>';
        echo '<p>' . $row['tags'] . '</p><br>';
        ?></div><br><?php
    }
    ?>
    <script>
        includeHTML();
    </script>
</center>
</body>
</html>
