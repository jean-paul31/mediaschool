<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

try {
    $conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . ";charset=utf8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );
    $userList =  $conn->query("SELECT * FROM users");

    if (isset($_GET['delete'])) {
        $delete = $_GET['delete'];
        $deleteUser = $conn->prepare("DELETE FROM users WHERE id = ?");
        $deleteUser->execute(array($delete));
    }
    

    if (isset($_GET['deleteMessage'])) {
        $deleteMessage = $_GET['deleteMessage'];
        $deleteComments = $conn->prepare("DELETE FROM comments WHERE message_id= ?");
        $deleteComments->execute(array($deleteMessage));
        $deleteOneMessage = $conn->prepare("DELETE FROM messages WHERE m_id = ?");
        $deleteOneMessage->execute(array($deleteMessage));
        // echo "<script type='text/javascript'>document.location.replace(dev-admin-school.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'] . ");</script>";
    }


    $messageList = $conn->query("SELECT * FROM messages");
} catch (\Throwable $th) {
    echo $th;
}