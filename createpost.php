<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = require __DIR__ . "/db_connection.php";
    $sqluser = "INSERT INTO Blogposts (user_id, content, tags) VALUES (?, ?, ?)";
    $sqltag = "INSERT INTO Tags (name) VALUES (?)";
    foreach (explode('#', $_POST["tags"]) as $tagnname){
        $statementtags = $db->stmt_init();
        if (!$statementtags->prepare($sqltag)){
            die("SQL error: " . $db->error);
        }
        $statementtags->bind_param("s", $tagnname);
        $statementtags->execute();
    }
    $statement = $db->stmt_init();

    if (!$statement->prepare($sqluser)){
        die("SQL error: " . $db->error);
    }

    $statement->bind_param("sss", $_SESSION["user_id"], $_POST["content"], $_POST["tags"]);

    if ($statement->execute()) {
        header("Location: index.php");
    } else {
        die($_SESSION["user_id"]);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Create post</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<center>

<h1>Create new post</h1>

<form method="post">
    <label for="content">Content</label>
    <textarea type="text" name="content" id="content" rows="10"></textarea>

    <label for="tags">Tags</label>
    <textarea type="text" name="tags" id="tags" rows="1"></textarea>

    <button>Add</button>
</form>

</center>
</body>
</html>