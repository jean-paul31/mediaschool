<?php
require "../controller/messageList.controler.php";
require "../controller/singleArticle.controler.php";
?>
<div class="new d-flex justify-content-center">
    <a class="btn btn-primary add" href="redaction.php?id=" <?= $id ?>  style="border: solid 2px black;">+</a>
</div>
<div class="col-6 justify-content-center">
    <div class="list">
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