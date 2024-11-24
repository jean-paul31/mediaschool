<?php
require "../controller/userList.controller.php";
?>

<div class="col-lg d-flex justify-content-end">
    <ul class="list-group admin-list users" style="list-style-type:none; border: solid 2px black; border-radius: 10px;">
        <?php
            while ($userDisplayInfo = $userListTchat->fetch()) {
                // Exclure l'utilisateur courant
                if ($userDisplayInfo['id'] != $_SESSION['id']) {
        ?>
        <li>
            <button class="btn text-start" data-bs-toggle="modal" data-bs-target="#staticBackdrop" 
                data-receiver-id="<?= $userDisplayInfo['id']; ?>" id="user-<?= $userDisplayInfo['id']; ?>">
                <img src="assets/membres/avatars/<?= $userDisplayInfo['avatar']; ?>" alt="" class="avatar" width="30px">
                - <?= $userDisplayInfo['name']; ?> -
                <?= $userDisplayInfo['surname']; ?>
                <!-- Badge pour les messages non lus, caché par défaut -->
                <span id="badge-<?= $userDisplayInfo['id']; ?>" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="display: none;">
                    99+
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>
        </li>
        <?php
                }
            }
        ?>
    </ul>
</div>

<script>
  // Fonction pour afficher le badge des messages non lus
  function showUnreadBadge(receiverId) {
    const badge = document.getElementById(`badge-${receiverId}`);
    console.log('Badge trouvé:', badge); // Vérifiez que l'élément existe
    if (badge) {
      badge.style.display = 'block';  // Affiche le badge
    } else {
      console.error('Badge non trouvé pour l\'utilisateur ID:', receiverId);  // Avertir si le badge n'est pas trouvé
    }
  }

  // Cible tous les boutons pour ouvrir le modal
  const chatButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

  chatButtons.forEach(button => {
      button.addEventListener('click', () => {
          // Récupère l'ID du récepteur
          const receiverId = button.getAttribute('data-receiver-id');
          const senderId = <?= json_encode($_SESSION['id']); ?>;

          // Met à jour la source de l'iframe dans le modal
          const iframe = document.querySelector('#staticBackdrop iframe');
          iframe.src = `http://127.0.0.1:3000/chat?sender=${senderId}&receiver=${receiverId}`;
      });
  });

  // Initialisation de la connexion Socket.io
  const socket = io();

  // Réception de l'événement pour afficher le badge de messages non lus
  socket.on('message', (data) => {
    // Vérifiez que l'événement est reçu et que l'ID de l'expéditeur n'est pas l'utilisateur actuel
    console.log('Message reçu:', data);  // Ajoutez ce log pour voir le message
    if (data.sender !== <?= json_encode($_SESSION['id']); ?>) {
      showUnreadBadge(data.receiver);  // Afficher le badge pour le récepteur
    }
  });

  // Réception de l'événement pour afficher le badge
  socket.on('showBadge', (receiverId) => {
    showUnreadBadge(receiverId);  // Afficher le badge pour l'utilisateur récepteur
  });

</script>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <iframe src="" frameborder="0" style="width: 100%; height: 400px;"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
