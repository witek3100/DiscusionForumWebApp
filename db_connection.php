<?php

$host = "127.0.0.1";
$dbname = "discussionforumdb";
$username = "root";
$password = "";

$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_errno) {
    die("Connection error: " . $db->connect_error);
}

return $db;