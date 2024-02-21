<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable("../");
$dotenv->load();



try {
    
    $conn = new PDO("mysql:host=" . $_ENV['SERVERNAME'] . ";dbname=" . $_ENV['DBNAME'] . "; charset=utf8", $_ENV['USERNAME'] , $_ENV['PASSWORD'] );   
    

    if (isset($_POST['connexion'])) 
    {
        $mailConnect = htmlspecialchars($_POST['mailConnect']);
        $mdpConnect = base64_encode(htmlspecialchars($_POST['mdpConnect']));

       if(!empty($mailConnect) AND !empty($mdpConnect))
       {
            $reqUser = $conn->prepare("SELECT * FROM users WHERE mail = ? AND mdp = ?");
            $reqUser->execute(array($mailConnect, $mdpConnect));
            $userExist = $reqUser->rowCount();

          
            if($userExist == 1)
            {
                $userinfo = $reqUser->fetch();                
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['name'] = $userinfo['name'];
                $_SESSION['mail'] = $userinfo['mail'];
                $_SESSION['admin'] = $userinfo['admin'];
                $message = "Vous etes connecté ! ";  
                if ($_SESSION['admin'] == 1) {
                    echo "<script type='text/javascript'>document.location.replace('index.php?id=". $_SESSION['id'] . "&admin=" . $_SESSION['admin'] ."');</script>";
                }else{
                    echo "<script type='text/javascript'>document.location.replace('index.php?id=". $_SESSION['id'] . "');</script>";
                }             
                
            }
            else
            {
                $erreur = "Mauvais mail ou mot de passe !";
            }
       }
       else
       {
            $erreur = "Tous les champs doivent être complétés !";
       }
    }
} catch (\Throwable $th) {
    echo $th;
}


