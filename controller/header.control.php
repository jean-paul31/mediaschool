<?php
require "../controller/connexion.php";
$connexion;
$monCompte;
$admin;
// $id = $_SESSION['id'];

if (isset($_GET['id']) && $_SESSION['admin'] == 0) 
{
    $connexion = "index.php?id=" . $_SESSION['id'];
    $monCompte =  "profil.php?id=" . $_SESSION['id'];
    $error = "Vous n'avez pas les droits";
}
else if (isset($_GET['id']) && $_SESSION['admin'] == 1) 
{
    $connexion = "index.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'];
    $monCompte =  "profil.php?id=" . $_SESSION['id'] . "&admin=" . $_SESSION['admin'];
    $admin = "dev-admin-school.php?id=". $_SESSION['id']."&admin=".$_SESSION['admin'];      
}else{
    $connexion = "signIn.php";
    $monCompte = "signIn.php";
}

