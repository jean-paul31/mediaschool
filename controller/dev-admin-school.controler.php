<?php

require "db.php";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $userList =  $conn->query("SELECT * FROM users");
    if (isset($_GET['delete'])) {
        $delete = $_GET['delete'];
        $deleteUser = $conn->prepare("DELETE FROM users WHERE id = ?");
        $deleteUser->execute(array($delete));
    }
    if (isset($_GET['deleteMessage'])) {
        $deleteMessage = $_GET['deleteMessage'];
        $deleteUser = $conn->prepare("DELETE FROM messages WHERE m_id = ?");
        $deleteUser->execute(array($deleteMessage));
        echo "<script type='text/javascript'>document.location.replace(dev-admin-school.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'] . ");</script>";
    }


    $messageList = $conn->query("SELECT * FROM messages");
} catch (\Throwable $th) {
    echo $th;
}