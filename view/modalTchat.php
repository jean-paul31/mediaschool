<?php
require "../controller/userList.controller.php";
require "../controller/modalTchat.controller.php";
?>
<script>
    $(document).ready(function(){
        var socket = io();

        $('form').submit(function(){
            socket.emit('chat message', $('#m').val());
            $('#m').val('');
            return false;
        });

        socket.on('chat message', function(msg){
            $('#messages').append($('<li>').text(msg));
            window.scrollTo(0, document.body.scrollHeight);
        });
    });
</script>
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <ul id="messages"></ul>
                        </div>
                        <form action="" method="POST">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Commentaires" aria-label="Commentaires" aria-describedby="button-addon2" name="comment" id="comment">
                                <div class="input-group-append">
                                    <input class="btn btn-outline-primary"
                                    type="submit" name="send" id="m" value=" Envoyer">
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#chatModal">
        Open Chat
    </button> -->
    <!-- <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chatModalLabel">Real-time Chat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="chatBox">
                        <ul id="messages"></ul>
                    </div>
                    <input id="m" autocomplete="off" /><button id="sendButton">Send</button>
                </div>
            </div>
        </div>
    </div> -->
