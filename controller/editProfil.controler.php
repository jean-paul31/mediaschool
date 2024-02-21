<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();

$conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . ";charset=UTF8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );

// $finfo = finfo_open(FILEINFO_MIME_TYPE);

if (isset($_SESSION['id'])) {

    $reqUser = $conn->prepare("SELECT * FROM users WHERE id=?");
    $reqUser->execute(array($_SESSION['id']));
    $user = $reqUser->fetch();

    if (isset($_POST['newSurname']) and !empty($_POST['newSurname']) and $_POST['newSurname'] != $user['name']) {
        $newSurname = htmlspecialchars($_POST['newSurname']);
        $insertSurname = $conn->prepare("UPDATE users SET surname = ? WHERE id = ?");
        $insertSurname->execute(array($newSurname, $_SESSION['id']));
        echo "<script type='text/javascript'>document.location.replace('profil.php?id=" . $_SESSION['id'] . "');</script>";
    }
    if (isset($_POST['newName']) and !empty($_POST['newName']) and $_POST['newName'] != $user['SURname']) {
        $newName = htmlspecialchars($_POST['newName']);
        $insertName = $conn->prepare("UPDATE users SET name = ? WHERE id = ?");
        $insertName->execute(array($newName, $_SESSION['id']));
        echo "<script type='text/javascript'>document.location.replace('profil.php?id=" . $_SESSION['id'] . "');</script>";
    }
    if (isset($_POST['newMail']) and !empty($_POST['newMail']) and $_POST['newMail'] != $user['mail']) {
        $newMail = htmlspecialchars($_POST['newMail']);
        $insertMail = $conn->prepare("UPDATE users SET mail = ? WHERE id = ?");
        $insertMail->execute(array($newMail, $_SESSION['id']));
        echo "<script type='text/javascript'>document.location.replace('profil.php?id=" . $_SESSION['id'] . "');</script>";
    }
    if (isset($_POST['newMdp']) and !empty($_POST['newMdp']) and isset($_POST['newMdp2']) and !empty($_POST['newMdp2'])) {
        $mdp = base64_encode($_POST['newMdp']);
        $mdp2 = base64_encode($_POST['newMpd2']);
        if ($mdp1 == $mdp2) {
            $insertMdp = $conn->prepare("UPDATE users SET mdp = ? WHERE id = ?");
            $insertMdp->execute(array($mdp, $_SESSION['id']));
            echo "<script type='text/javascript'>document.location.replace('profil.php?id=" . $_SESSION['id'] . "');</script>";
        } else {
            $msg = "Vos 2 mots de passe ne correspondent pas !";
        }
    }

    if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {
        $tailleMax = 2097152;
        if ($_FILES['avatar']['size'] <= $tailleMax) {
            $monMime = mime_content_type($_FILES['avatar']['tmp_name']);
            if ($monMime == "image/jpeg" or $monMime == "image/jpg" or $monMime == "image/png" or $monMime == "image/gif") {
                $nomDuFichier = $_POST['avatar'];
                $whachName = preg_replace('~[^\\pL\d]+~u', '-', $nomDuFichier);
                $whachName = trim($whachName, '-');
                $whachName = strtolower($whachName);
                $cleanName = preg_replace('~[^-\w]+~', '', $whachName);
                $extension = substr(strrchr($_FILES['avatar']['name'], "."), 1);
                $pathimg = "assets/membres/avatars/" . $_SESSION['id'] . "." . $extension;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $pathimg);
                if ($resultat) {
                    $suppressAvatar = $conn->prepare('DELETE avatar FROM users where id = ?');
                    $suppressAvatar->execute(array($_SESSION['id']));

                    $updateAvatar = $conn->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                    $updateAvatar->execute(array(
                        'avatar' => $cleanName . "." . $extension,
                        'id' => $_SESSION['id']
                    ));
                    $msg = "Le fichier à bien été uploadé!";
                    echo "<script type='text/javascript'>document.location.replace('profil.php?id=" . $_SESSION['id'] . "');</script>";
                } else {
                    $msg = "Il y a eu un probleme lors du chargement";
                }
            } else {
                $msg = "votre avatar doit etre de type jpg ou jpeg, png ou gif";
            }
        } else {
            $msg = "Votre photo de profil ne doit pas dépasser 2 Mo";
        }
    }
}
