<?php 
      session_start();
      require_once '../include/database.php';
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier <?php echo $categorie['LIBELLE']    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/produit.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

</head>
<body>
<?php include'../include/nav_front.php' ?>
<center><h2>Panier</h2></center>
<div class="container">
  <div class="container">
    <div class="row">
        

    <?php
     $idUtilisateur=$_SESSION['UTILISATEUR']['ID'];
     

     $panier=$_SESSION['panier'][$idUtilisateur];
     $IdProduits=array_keys($panier);
     $IdProduits=implode(',',$IdProduits);
     $produits=$pdo->query("SELECT * FROM produit WHERE ID IN ($IdProduits)")->fetchAll(PDO::FETCH_ASSOC);
     var_dump($panier);
     
      
      if(empty($panier)){

    ?>
    <div class="alert alert-warning" role="alert">
        Votre panier est vide
    </div>
    <?php
      }else{
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">LIBELLE</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Opération</th>
                </tr>
            </thead>
            <?php
        foreach($produits as $produit){
            ?>
            <tr>
                <td>#<?php echo $produit['ID']  ?></td>
                <td><?php echo $produit['LIBELLE']  ?></td>
                <td>x<?php include '../include/front/counter.php'  ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
      }
      ?>



      
        

 



 </div>
</div> 
</div>
<script src="../asset/js/produit/counter.js"></script>

</body>
</html>