<?php
require "../controller/userList.controller.php";




?>


<div class="col-md">
    <ul class="list-group admin-list">
        <?php
        while ($userDisplayInfo = $userListTchat->fetch()) {
        ?>
        <li class="list-group-item">
            <a type="btn btn-secondary" class="btn btn-default" data-toggle="modal"
                    data-target="#exampleModal"><img
                    src="assets/membres/avatars/<?= $userDisplayInfo['avatar']; ?>" alt="" class="avatar" width="30px">
                - <?= $userDisplayInfo['name']; ?> -
                <?= $userDisplayInfo['surname']; ?></a>
        </li>
        <?php
        }
        ?>
    </ul>
</div>