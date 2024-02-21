<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

try {
    $conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . ";charset=UTF8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );
    $userListTchat = $conn->query("SELECT * FROM users");
} catch (\Throwable $th) {
    echo $th;
}