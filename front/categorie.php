<?php 
      session_start();
      $id=$_GET['id'];
      require_once '../include/database.php';
      $sqlstate=$pdo->prepare('SELECT * FROM categorie WHERE ID=?');
      $sqlstate->execute([$id]);
      $categorie=$sqlstate->fetch(PDO::FETCH_ASSOC);

      $sqlstate=$pdo->prepare('SELECT * FROM produit WHERE ID_CATEGORIE=?');
      $sqlstate->execute([$id]);
      $produits=$sqlstate->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégorie | <?php echo $categorie['LIBELLE']    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/produit.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

</head>
<body>
<?php include'../include/nav_front.php' ?>
<center><h2><?php echo $categorie['LIBELLE']    ?></h2></center>
<div class="container">
  <div class="container">
    <div class="row">

    <?php
      if(!empty($produits)){
      foreach($produits as $produit){
        $idProduit=$produit->ID;
        ?>

<div class="card mb-3 col-md-4 m-1">
  <img src="../upload/produit/<?=$produit->IMAGE ?>" class="card-img-top" alt="..." height="300" >
  <div class="card-body">
    <a href="produit.php?id=<?php echo $produit->ID ?>" class="btn stretched-link">Affichier détails</a>
    <h5 class="card-title"><?php echo $produit->LIBELLE  ?></h5>
    <p class="card-text"><?php echo $produit->DESCRIPTION ?></p>
    <p class="card-text"><?php echo $produit->PRIX  ?> MAD</p>
    <p class="card-text"><small class="text-body-secondary">Ajouter le <?= date_format(date_create($produit->DATE_CREATION ),'Y/m/d')     ?></small></p>
   </div>
   <div class="card-footer" style="z-index:10;">
    <?php include '../include/front/counter.php'   ?>
     
   </div>
   </div>






    <?php

      }}else{
    ?>
     <div class="alert alert-info my-2" role="alert">
     Pas de produit pour l'instant</div>
    <?php
      }
    ?>




  
   














</div>
</div> 
</div>
<script src="../asset/js/produit/counter.js"></script>

</body>
</html>