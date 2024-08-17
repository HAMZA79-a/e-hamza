<?php

require_once 'include/database.php';
$id=$_GET['id'];
$sqlstate=$pdo->prepare('DELETE FROM produit WHERE ID=?');
$supprime=$sqlstate->execute([$id]);
if($supprime){
    header('location:produits.php');
}else{
    echo"DataBase Erreur";
}



?>