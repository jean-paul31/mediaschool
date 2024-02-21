<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

$id = $_SESSION['id'];


$conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . ";charset=UTF8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );  



    
    $reqMessage = $conn-> query('SELECT * FROM messages INNER JOIN users ON messages.user_id = users.id');
   
