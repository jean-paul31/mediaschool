<?php
session_start();
require "../controller/head.php";
require "header.php";
require "../controller/connexion.php";
?>
<div class="row justify-content-center">
    <div class="col-md-4 signIn">
        <?php
        if (!isset($_POST['connexion'])) { ?>
        <form action="" method="post" class="form-group">
            <div>
                <label for="mailConnect">email:</label>
                <input type="email" name="mailConnect" id="mailConnect" class="form-control">
            </div>
            <div>
                <label for="mdpConnect">mot de passe:</label>
                <input type="password" name="mdpConnect" id="mdpConnect" class="form-control">
            </div>
            <br>
            <div>
                <input type="submit" class="btn btn-primary" value="connexion" name="connexion">
            </div>
            <span>Vous n'avez pas encore de compte? <a href="signUp.php"> Créer un compte</a></span>
            <?php
        }
            ?>

        </form>
        <?php
            if (isset($erreur)) {
                echo "<p class='text-danger'>" . $erreur . "</p>";
            }
            if (isset($message)) {
                echo "<p class='text-success'>" . $message . " cliquez <a href='index.php?id=" . $_SESSION['id'] . "'> ici </a></p>";
            }
            ?>
    </div>
</div>

<?php require "footer.php" ?>