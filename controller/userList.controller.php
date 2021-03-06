<?php
require "db.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $userListTchat = $conn->query("SELECT * FROM users");
} catch (\Throwable $th) {
    echo $th;
}