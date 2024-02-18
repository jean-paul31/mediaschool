<?php
session_start();
include "../controller/head.php";
require "header.php";
include "../controller/header.control.php";
require "../controller/dev-admin-school.controler.php";
?>

<div class="container-fluid ">
    <div class="row d-flex justify-content-around">
        <div class="col-md-2 profil">
            <ul class="list-group admin-list" style="list-style-type:none;">
                <?php
                while ($listInfo = $userList->fetch()) {
                    $userId = "dev-admin-school.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'] . "&delete=" . $listInfo['id'];
                ?>
                </br>
                <li class=" d-flex justify-content-between">
                    <span><?=$listInfo['name']; ?> - <?= $listInfo['surname']; ?></span>
                    <form action="" method="post">
                        <a type="submit" name="deleteUser" class="btn btn-warning" href="<?= $userId ?>">Supprimer</a>
                    </form>
                    
                </li>
                </br>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-md-6 profil">
            <ul class="list-group admin-list" style="list-style-type:none;">
                <?php
                while ($messageInfo = $messageList->fetch()) {
                    $articleId = "dev-admin-school.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'] . "&deleteMessage=" . $messageInfo['m_id'];
                ?>
                </br>
                <li class="row d-flex justify-content-between">
                    <h2><a href="<?= $articleId ?>" name="singleArticle"
                            id="singleArticle"><?= $messageInfo['title']; ?></a></h2>
                    <span><?= $messageInfo['createdAt']; ?></span>
                    <a type="submit"  name="deleteMessage" class="btn btn-warning" href="<?= $articleId ?>">Supprimer</a>
                </li>
                </br>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>