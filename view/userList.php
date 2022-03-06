<?php
require "../controller/userList.controller.php";




?>


<div class="col-md">
    <ul class="list-group admin-list">
        <?php
        while ($userDisplayInfo = $userListTchat->fetch()) {
        ?>
        <li class="list-group-item">
            <a type="btn btn-secondary" class="btn btn-default" href="http://127.0.0.1:3000/" target="_blank"><img
                    src="assets/membres/avatars/<?= $userDisplayInfo['avatar']; ?>" alt="" class="avatar" width="30px">
                - <?= $userDisplayInfo['name']; ?> -
                <?= $userDisplayInfo['surname']; ?></a>
        </li>
        <?php
        }
        ?>
    </ul>
</div>