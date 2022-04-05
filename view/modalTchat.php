<?php
require "../controller/userList.controller.php";
require "../controller/modalTchat.controller.php";
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div id="messages">
                        <div class="tchatList">
                            
                        </div>
                        <form action="" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Commentaires" aria-label="Commentaires" aria-describedby="button-addon2" name="comment" id="comment">
                                <div class="input-group-append">
                                    <input class="btn btn-outline-primary"
                                    type="submit" name="send" id="send" value=" Envoyer">
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>