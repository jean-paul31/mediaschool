<?php
require "../controller/messageList.controler.php";
require "../controller/singleArticle.controler.php";
?>
<div class="new  justify-content-center">
    <a class="btn btn-primary add" href="redaction.php?id=" <?= $id ?>>+</a>
</div>
<div class="row justify-content-center">
    <div class="col-lg list">
        <?php
        while ($messageInfo = $reqMessage->fetch()) {
            $articleId = "singleArticle.php?id=" . $_SESSION['id'] . "&art_id=" . $messageInfo['m_id'];
        ?>
        <tr>
            <td>
                <h2><a href="<?= $articleId ?> " name="singleArticle"
                        id="singleArticle"><?= $messageInfo['title']; ?></a></h2>
                <span><?= $messageInfo['createdAt']; ?></span>
            </td>
        </tr>
        <?php
        }
        ?>
    </div>
</div>