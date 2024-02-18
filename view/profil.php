<?php
session_start();

require "../controller/head.php";
require "header.php";
require "../controller/profil.controler.php";
require "../controller/editProfil.controler.php";
require "modalPlusChild.php";
require "../controller/modalPlusChild_control.php";




?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div>
                <button type="btn btn-secondary" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModal">
                    Ajouter un enfant
                </button>
            </div>
            </br>
            <div class=" profil">
                <ul class="list-group admin-list" style="list-style-type:none;">
                    <?php
                    while ($childInfo = $reqChild->fetch()) {
                        if ($childInfo['user_id'] == $_SESSION['id']) {
                    ?>
                    <li class="text-center">
                        <span><?= $childInfo['childName']; ?> - <?= $childInfo['childSurname']; ?> -
                            <?= $childInfo['className']; ?></span>
                    </li>
                    </br>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col"></div>
        <div class="col-md-4 profil">
            <div>
                <h2>Profil de <?php echo $userInfo['surname'] ?></h2>
                <br><br>
                <?php
                if (!empty($userInfo['avatar'])) {
                ?>
                <img src="assets/membres/avatars/<?php echo $userInfo['avatar']; ?>" alt="" class="avatar"
                    width="150px">
                <?php
                } else { ?>
                <img src="assets/membres/avatars/default.png" alt="" class="avatar" width="150px">
                <?php
                }
                ?>
                <br>
                nom : <?php echo $userInfo['name'] ?>
                <br>
                prenom : <?php echo $userInfo['surname'] ?>
                <br>
                mail : <?php echo $userInfo['mail'] ?>
                <br>
                <?php
                if (isset($_SESSION['id']) and $userInfo['id'] == $_SESSION['id']) {
                ?>
                <a href="<?php echo "editProfile.php?id=" . $_SESSION['id'] ?>">Editer mon profil</a>
                <?php
                }
                if (isset($msg)) {
                ?>
                <span class="text-danger"><?= $msg ?> </span>
                <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>

<?php
require "footer.php";
?>