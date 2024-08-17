<?php

require_once 'include/database.php';
$id=$_GET['id'];
$sqlstate=$pdo->prepare('DELETE FROM categorie WHERE ID=?');
$supprime=$sqlstate->execute([$id]);
if($supprime){
    header('location:categories.php');
}else{
    echo"DataBase Erreur";
}



?>