<?php
require "../controller/db.php";

$id = $_SESSION['id'];


$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);  



    
    $reqMessage = $conn-> query('SELECT * FROM messages INNER JOIN users ON messages.user_id = users.id');
   
