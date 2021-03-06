<?php
// session_start();
require "../controller/header.control.php";
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= $connexion ?>">MEDIASCHOOL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="nav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?php
          if (isset($_SESSION['id'])) {?>
            <a class="nav-link" href="deconnexion.php">Déconnexion</a>
            <?php
          }
          else
          {
            ?>
            <a class="nav-link" href="signIn.php">Connexion</a>
            <?php
          }
        ?>
        
      </li>
      <li class="nav-item active">
      <?php
          if (isset($_SESSION['id'])) {
            ?>
            <a class="nav-link" href="<?=$monCompte?>">Mon Compte</a>
            </li>
            <li class="nav-item active">
            <?php
          }
          if (isset($_SESSION['id']) && $_SESSION['admin'] == 1) {
            ?>
            <a class="nav-link" href="<?=$admin?>">Administration</a>
            </li>
            <?php
            if($_SESSION['admin'] == 0){
              ?>
            <span style="color:aliceblue"><?php echo "vous n'étes pas autorisé à accéder à cette page!" ?></span>
            <?php
            }       
          }
          ?>
    </ul>
  </div>
</nav>
<br>
<br>
<br>
