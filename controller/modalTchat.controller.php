<?php
require "db.php";


$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);

$reqTchat = $conn->query('SELECT * FROM `tchat` JOIN users on tchat.id_sender = users.id AND tchat.id_receiver = users.id');
echo "<script> console.log('première étape')</script>";

if (isset($_POST['send'])) {
    $content = htmlspecialchars($_POST['comment']);
    $sender = $_SESSION['id'];
    $receiver = $userDisplayInfo['id'];
    $insertTchat = $conn->prepare('INSERT INTO tchat(id_sender, id_receiver, content)VALUES(?, ?, ?');
    $insertTchat->execute(array(
    $sender,
    $receiver,
    $content
    ));
    echo "<script> console.log('deuxième étape')</script>";  
}