<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $db = require __DIR__ . "/db_connection.php";
    $sql = sprintf("SELECT * FROM Users WHERE email = '%s'", $db->real_escape_string($_POST["email"]));
    $result = $db->query($sql);
    $user = $result->fetch_assoc();

    if ($user) {

        if ($_POST["password"] === $user["password"]) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: index.php");
            exit;
        }
    }
    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<center>

<h1>Login</h1>

<?php if ($is_invalid): ?>
    <em>Invalid login</em>
<?php endif; ?>

<form method="post">
    <label for="email">Email</label>
    <input type="email" name="email" id="email"
           value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button>Log in</button>
</form>

</center>
</body>
</html>

