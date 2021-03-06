<?php
session_start();
include "../controller/head.php";
require "header.php";
include "../controller/header.control.php";
require "../controller/dev-admin-school.controler.php";
?>

<div class="container ">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group admin-list">
                <?php
                while ($listInfo = $userList->fetch()) {
                    $userId = "dev-admin-school.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'] . "&delete=" . $listInfo['id'];
                ?>
                <li class="list-group-item">
                    <span><?= $listInfo['name']; ?> - <?= $listInfo['surname']; ?></span>
                    <a name="delete" class="btn btn-warning" href="<?= $userId ?>">Supprimer</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
        <div class="col-md-6">
            <ul class="list-group">
                <?php
                while ($messageInfo = $messageList->fetch()) {
                    $articleId = "singleArticle.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'] . "&art_id=" . $messageInfo['m_id'] . "&deleteMessage=" . $messageInfo['m_id'];
                ?>
                <li class="list-group-item">
                    <h2><a href="<?= $articleId ?>" name="singleArticle"
                            id="singleArticle"><?= $messageInfo['title']; ?></a></h2>
                    <span><?= $messageInfo['createdAt']; ?></span>
                    <a name="delete" class="btn btn-warning" href="<?= $articleId ?>">Supprimer</a>
                </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>