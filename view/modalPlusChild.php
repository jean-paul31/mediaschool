<?php
require "../controller/profil.controler.php";
require "../controller/modalPlusChild_control.php";
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un enfant</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-group">
                    <div class="form">
                        <label for="">Nom de l'enfant:</label>
                        <input type="text" name="childName" id="childName" class="form-control">
                    </div>
                    <div class="form">
                        <label for="">Prénom de l'enfant:</label>
                        <input type="text" name="childSurname" id="childSurname" class="form-control">
                    </div>
                    <br>
                    <div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Classe</label>
                            </div>
                            <select class="custom-select" id="inputGroupSelect01" name="class">
                                <option selected>Classe de l'enfant</option>
                                <?php
                                while ($classInfo = $reqClass->fetch()) {
                                ?>
                                <option value="<?= $classInfo['id'] ?>">
                                    <?= $classInfo['className'] ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Fermer">
                        <input type="submit" class="btn btn-primary" id="formSaveChild" name="formSaveChild"
                            value="Enregistrer un enfant">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>