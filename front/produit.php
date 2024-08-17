<?php 
      session_start();
      $id=$_GET['id'];
      require_once '../include/database.php';
      
      $sqlstate=$pdo->prepare('SELECT * FROM produit WHERE ID=?');
      $sqlstate->execute([$id]);
      $produit=$sqlstate->fetch(PDO::FETCH_ASSOC);

      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>produit | <?php echo $produit['LIBELLE']    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/produit.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</head>
<body>
<?php include'../include/nav_front.php' ?>
<!-- <center><h2><?php echo $produit['LIBELLE']    ?></h2></center> -->
<br>
<div class="container">
  <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img img-fluid w-75" src="../upload/produit/<?php echo $produit['IMAGE'] ?>" alt="<?php echo $produit['LIBELLE']    ?>">
        </div>
        <div class="col-md-6">
            
            <h1 style="display: flex;"><?php echo $produit['LIBELLE'];
            
            $discount=$produit['DISCOUNT'];
            ?>
            <?php if(!empty($produit['DISCOUNT'] )){
                ?>
                <p>
                    <span class="badge text-bg-success" style="padding: 5px 10px;
                     margin-left: 10px;">- <?php echo $produit['DISCOUNT'];?> %</span>
                
                </p>

            <?php
            } 
            ?>
            
            
            </h1><hr>
            <p style="font-size:19px"><?php echo $produit['DESCRIPTION']    ?></p>
            
            <?php
            $prix=$produit['PRIX'];
            $total=$prix;
            if(!empty($discount)){
                $total=$prix - (($prix*$discount)/100) ;
                ?>
            <h2>
            <span class="badge text-bg-danger"><strike><?php echo $prix;?> MAD</strike></span>
            <span class="badge text-bg-success"><?php echo $total?> MAD</span>
            </h2>
            <?php
            }else{
                $total=$prix;
                ?>
            <h2>
               <span class="badge text-bg-success"><?php echo $total;?> MAD</span>
            </h2>
            <?php
            }
            ?>
            
            
            
            <br>
            <?php
             $idProduit=$produit['ID'];
             include '../include/front/counter.php'   ?>
     
            
            
            <hr>
            
        </div>


</div>
</div> 
</div>
<script src="../asset/js/produit/counter.js"></script>
</body>
</html>