<?php

$host = "localhost";
$dbname = "discussionforumdb";
$username = "user";
$password = "userUSER1/";

$db = new mysqli($host, $username, $password, $dbname);

if ($db->connect_errno) {
    die("Connection error: " . $db->connect_error);
}

return $db;
