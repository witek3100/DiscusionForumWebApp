<?php

if (empty($_POST["name"])) {
    die("Name field cannot be empty");
}

if (empty($_POST["surname"])) {
    die("Surname field cannot be empty");
}

if (strlen($_POST["password"]) < 8){
    die("password must be at least 8 characters long");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("password must contain at least one number");
}

if ($_POST["password"] !== $_POST["confirm_password"]) {
    die("passwords must match");
}

$pass_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$db = require __DIR__ . "/db_connection.php";

$sql = "INSERT INTO Users (Name, Surname, Email, Password) VALUES (?, ?, ?, ?)";

$statement = $db->stmt_init();

if (!$statement->prepare($sql)){
    die("SQL error: " . $db->error);
}

$statement->bind_param("ssss", $_POST["name"], $_POST["surname"], $_POST["email"], $_POST["password"]);

if ($statement->execute()) {
    header("Location: login.php");
} else {
    if ($db->errno === 1062) {
        die("Email already taken");
    } else {
        die($db->error . " " . $db->errno);
    }
}

