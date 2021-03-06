<?php
session_start();
require "../controller/head.php";
require "header.php";
require "../controller/singleArticle.controler.php";
require "../controller/messageList.controler.php";
require "../controller/profil.controler.php";
require "../controller/header.control.php";


//vérifie que "art_id" existe bien dans l'URL
if (isset($_GET['art_id'])) {
    //itére le contenu HTML présent par rapport au tableau $articleInfo
    while ($articleInfo = $reqArticle->fetch()) 
    {
        ?>
        <div class="container">
            
            <div class="row justify-content-center">  
                <button class="btn btn-default" name="back"><a href="<?= $_SESSION['admin'] ? $admin : $connexion?>"><i class="fas fa-arrow-circle-left"></i></a></button>          
                <div class="col-md-4 singlePost">
                    <br>    
                    <div class="pseudo">                        
                        <?php
                    if(!empty($userInfo['avatar']))
                    {   
                        ?>
                        <img src="assets/membres/avatars/<?= $articleInfo['avatar'];?>" alt="" width="100px" height="100px">
                        <?php
                    }else {?>
                        <img src="assets/membres/avatars/default.png" alt="" class="avatar" width="150px">
                        <?php
                    }
                ?>
                        <span><?= $articleInfo['surname'];?></span>
                    </div>        
                    <h2><?= $articleInfo['title'];?></h2>
                    <span><?= $articleInfo['createdAt'];?></span>        
                    <p><?= $articleInfo['texte'];?></p>     
                    <br><br>
                    <div>               
                        <?php
                        if ($_SESSION['id']) {
                            require "commentaires.php"; #integre la partie commentaires
                        }
                        
                        ?> 
                    </div>
                </div>
            </div>
        </div>
        
    <?php
    }    
}
require "footer.php";
