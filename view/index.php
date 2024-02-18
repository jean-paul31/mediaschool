<?php
session_start();
require "../controller/head.php";
require "../controller/connexion.php";
require "header.php";
require "modalTchat.php";
require "../controller/modalTchat.controller.php";

if (isset($_GET['id'])) { ?>
<div class="container-fluid">
    <div class="row"><?php
                            require "messagesList.php";
                            require "userList.php";
                            ?>


    </div>
</div>
<?php

} else {
    $erreur = "vous devez etre connecté pour voir les messages !"
?>
<div class="row  justify-content-center">
    <div class="col-md-4 erreur">
        <span><?= $erreur ?></span>
    </div>
</div>
<?php
}





require "footer.php";