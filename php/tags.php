
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
    <h1>Tags</h1>
    <?php
    $db = require __DIR__ . "/db_connection.php";
    $sql = "SELECT * FROM Tags";
    $result = $db->query($sql);

    while ($row = $result->fetch_assoc())
    {
        ?>&nbsp&nbsp&nbsp<a href="?tag=<?php echo $row['name']?>">#<?php echo $row['name'] . ' ';?><a><?php
    }
    ?>
</center>
<script>
    includeHTML();
</script>
</body>
</html>

