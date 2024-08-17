<?php

session_start();
if(!isset($_SESSION['UTILISATEUR'])){
    header('location:../connexion.php');
}

$id=$_POST['id'];
$qty=$_POST['QTY'];
$idUtilisateur=$_SESSION['UTILISATEUR']['ID'];


    if(!isset($_SESSION['panier'][$idUtilisateur])){
        $_SESSION['panier'][$idUtilisateur]=[];
    }
    if($qty == 0){
      unset($_SESSION['panier'][$idUtilisateur][$id]);
    }else{
    $_SESSION['panier'][$idUtilisateur][$id]=$qty;
    }

    // var_dump($_SESSION['UTILISATEUR']);



    header("location:produit.php?id=$id");



?>