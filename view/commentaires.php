<?php
require "../controller/commentaire.control.php";
?>


<?php
while ($commentInfo = $reqComment->fetch()) {
    if ($commentInfo['message_id'] == $_GET['art_id']) {

        if (!empty($userInfo['avatar'])) {
?>
<img src="assets/membres/avatars/<?= $commentInfo['avatar'] ?>" alt="" width="50px" height="50px" class="avatarComm">
<?php
        } else { ?>
<img src="assets/membres/avatars/default.png" alt="" class="avatar" width="150px">
<?php
        }
        ?>

<span><?= $commentInfo['surname'] ?></span>
<p><?= $commentInfo['c_texte'] ?></p><br><br>

<?php
    } else {
        $erreur = "il y a eu un probleme !";
    }
}

?>


<form action="" method="post" class="form-group com form-inline">
    <div class="col-auto">
        <input type="text" name="commentaire" id="commentaire" class="form-control" placeholder="Commentaires">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-default send" name="com"><i class="fas fa-paper-plane"></i></button>
    </div>
</form>