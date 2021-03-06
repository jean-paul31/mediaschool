<?php
require "userList.controller.php";
require "db.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $messagesDisplay = $conn->query("SELECT * FROM tchat");
} catch (\Throwable $th) {
    echo $th;
}