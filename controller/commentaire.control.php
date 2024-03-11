<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

$conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . ";charset=UTF8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );
if (isset($_GET['art_id'])) {
    if (isset($_POST['com'])) {
        if (!empty($_POST['commentaire'])) {
            $author = $_SESSION['id'];
            $message = $_GET['art_id'];
            $comContent = htmlspecialchars($_POST['commentaire']);
            $insertComment = $conn->prepare("INSERT INTO comments(user_id ,  message_id, c_texte) VALUES (?, ?, ?)");
            $insertComment->execute(array($author, $message, $comContent));
        } else {
            $erreur = "Une erreur est survenue !";
        }
    }
}

$reqComment = $conn->query('SELECT *FROM comments JOIN users ON comments.user_id   = users.id JOIN messages ON comments.message_id = messages.m_id');
$reqComment->execute(array());
