<?php
require '../vendor/autoload.php';
require "../controller/modalPlusChild_control.php";

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

$conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . ";charset=UTF8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );

if (isset($_GET['id']) and $_GET['id'] > 0) {

    $getId = intval($_GET['id']);
    $reqUser = $conn->prepare('SELECT * FROM users WHERE id = ?');
    $reqUser->execute(array($getId));
    $userInfo = $reqUser->fetch();
}

// $reqClass = $conn->query('SELECT * FROM class');
// $reqChild = $conn->query('SELECT * FROM children JOIN users ON children.user_id = users.id JOIN class ON children.class_id = class.id');

// if (isset($_POST['formSaveChild'])) {

//     $childName = htmlspecialchars($_POST['childName']);
//     $childSurname = htmlspecialchars($_POST['childSurname']);
//     $childClass = $_POST['class'];

//     if (!empty($_POST['childName']) and !empty($_POST['childSurname']) and !empty($_POST['class'])) {

//         $searchChild = $conn->prepare("SELECT * FROM children WHERE childName = ? AND childSurname = ? ");
//         $searchChild->execute(array($childName, $childSurname));
//         $childExist = $searchChild->rowCount();

//         if ($childExist == 1) {

//             $insertChild = $conn->prepare("INSERT INTO children (childName, childSurname, class_id, user_id) VALUES (?, ?, ?, ?)");
//             $insertChild->execute(array(
//                 htmlspecialchars_decode($childName),
//                 htmlspecialchars_decode($childSurname),
//                 intval($childClass),
//                 $_SESSION['id']
//             ));
//             $msg = "Votre enfant à bien été !";
//         } else {
//             $erreur = "Cet enfant est déjà inscrit !";
//         }
//     } else {
//         $erreur = "Tous les champs doivent être remplis !";
//     }
// }
// var_dump($_REQUEST);