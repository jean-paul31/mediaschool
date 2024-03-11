<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();


$conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . ";charset=utf8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );

echo "<script type='text/javascript'>console.log('étape 1 ok');</script>";
$reqClass = $conn->query('SELECT * FROM class');


if (isset($_POST['formSaveChild'])) {

    $childName = htmlspecialchars($_POST['childName']);
    $childSurname = htmlspecialchars($_POST['childSurname']);
    $childClass = $_POST['class'];

    if (!empty($_POST['childName']) and !empty($_POST['childSurname']) and !empty($_POST['class'])) {

        $searchChild = $conn->prepare("SELECT * FROM children WHERE childName = ? AND childSurname = ? ");
        $searchChild->execute(array($childName, $childSurname));
        $childExist = $searchChild->rowCount();


        if ($childExist == 0) {

            $insertChild = $conn->prepare("INSERT INTO children (childName, childSurname, class_id, user_id ) VALUES (?, ?, ?, ?)");
            $insertChild->execute(array(
                $childName,
                $childSurname,
                $childClass,
                $_SESSION['id']
            ));


            $msg = "Votre enfant à bien été !";
        } else {
            $erreur = "Cet enfant est déjà inscrit !";
        }
    } else {
        $erreur = "Tous les champs doivent être remplis !";
    }
}
$reqChild = $conn->query('SELECT * FROM children JOIN users ON children.user_id   = users.id JOIN class ON children.class_id = class.id');