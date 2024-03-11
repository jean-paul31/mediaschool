<?php
require "../controller/userList.controller.php";




?>


<div class="col-lg d-flex justify-content-end">
    <ul class="list-group admin-list users" style="list-style-type:none; border: solid 2px black; border-radius: 10px;">
    <?php
        while ($userDisplayInfo = $userListTchat->fetch()) {
            if ($userDisplayInfo['id'] != $_SESSION['id']) {
    ?>
                <!-- <tr class="list-group-item">-->
            </br> 
                    <li>
                        <a class="btn text-start" target="_blank" href="http://127.0.0.1:3000/user/<?=$userDisplayInfo['id']?>/message">
                        <img src="assets/membres/avatars/<?= $userDisplayInfo['avatar']; ?>" alt="" class="avatar" width="30px">
                        - <?= $userDisplayInfo['name']; ?> -
                        <?= $userDisplayInfo['surname']; ?>
                        </a>
                    </li>
                <!-- </tr> -->
        <?php
            }
        }
        ?>
    </ul>
</div>