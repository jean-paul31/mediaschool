<?php
session_start();
require "../controller/head.php";
require "../controller/createAccount.php";
require "header.php";
?>
<div class="row justify-content-center">
    <div class="col-md-4 signUp">
        <div>
            <h2>Inscription</h2>
        </div>       
        <br>
        <form action="" method="POST" class="form-group">
            <div>
                <label for="name">Nom:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="votre nom" value="<?php if(isset($name)) { echo $name; }?>">
            </div>
            <div>
                <label for="surname">prénom:</label>
                <input type="text" name="surname" id="surname" class="form-control" placeholder="votre prénom" value="<?php if(isset($surname)) { echo $surname; }?>">
            </div>
            <div>
                <label for="mail">email:</label>
                <input type="email" name="mail" id="mail" class="form-control" placeholder="votre email" value="<?php if(isset($mail)) { echo $mail; }?>">
            </div>
            <div>
                <label for="mdp">mot de passe:</label>
                <input type="password" name="mdp" id="mdp" class="form-control" placeholder="votre mot de passe">
            </div>
            <div>
                <label for="mdp2">vérification:</label>
                <input type="password" name="mdp2" id="mdp2" class="form-control" placeholder="confirmation">
            </div>
            <span>Vous avez deja un compte? <a href="signIn.php"> Me connecter</a></span>
            <br>
            <div>
                <input type="submit" name="formInscription" class="btn btn-primary" value="Créer mon compte">
            </div>
        </form>
        <?php
            if(isset($erreur))
            {
                echo "<p class='text-danger'>" . $erreur . "</p>";
            }
        ?>
    </div>
</div>