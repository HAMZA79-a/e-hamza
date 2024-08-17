<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    include'include/nav.php' ;
    require_once 'include/database.php';
    ?>
    <center><h2>Modifier produit</h2></center>
    <div class="container">
        <?php
         $id=$_GET['id'];
         $sqlstate=$pdo->prepare('SELECT * from produit WHERE ID=?');
         $sqlstate->execute([$id]);
         $produit=$sqlstate->fetch(PDO::FETCH_ASSOC);
         
         if(isset($_POST['MODIFIER'])){
            $libelle=$_POST['LIBELLE'];
            $prix=$_POST['PRIX'];
            $discount=$_POST['DISCOUNT'];
            $categorie=$_POST['CATEGORIE'];
            $description=$_POST['DESCRIPTION'];
            $filename='';
            if(!empty($_FILES['IMAGE']['name'])){
                $image=$_FILES['IMAGE']['name'];
                $filename=uniqid().$image;
                move_uploaded_file($_FILES['IMAGE']['tmp_name'],'upload/produit/'.$filename);
   
            }


            if(!empty($libelle) && !empty($prix) && !empty($categorie)){
                if(!empty($filename)){
                $query='UPDATE produit SET LIBELLE=?,PRIX=?,DISCOUNT=?,ID_CATEGORIE=?,DESCRIPTION=?,IMAGE=? WHERE ID=?';
                $sqlstate=$pdo->prepare($query);
                $updated=$sqlstate->execute([ $libelle,$prix,$discount,$categorie,$description,$filename,$id]);
              }else{
                $query='UPDATE produit SET LIBELLE=?,PRIX=?,DISCOUNT=?,ID_CATEGORIE=?,DESCRIPTION=? WHERE ID=?';
                $sqlstate=$pdo->prepare($query);
                $updated=$sqlstate->execute([ $libelle,$prix,$discount,$categorie,$description,$id]);

              }
              if($updated){
                header('location:produits.php');
              }
            
            
            
            
               
            }else{
                ?>
                <div class="alert alert-danger my-2" role="alert">
                Libelle ,prix et catégorie sont obligatoires</div>
                <?php

                
            }
        }
         
        

        ?>



        
    
    <form action="" method="post" enctype="multipart/form-data">
    <input hidden type="text" name="ID" value="<?php echo $produit['ID'] ?>">

    <label for="inputPassword5" class="form-label">Libelle</label>
    <input type="text"  class="form-control" name="LIBELLE" value="<?php echo $produit['LIBELLE'] ?>">
    
    <label for="inputPassword5" class="form-label">Prix</label>
    <input type="number"  class="form-control" name="PRIX" min="0" step="0.5" value="<?php echo $produit['PRIX'] ?>">

    <label for="inputPassword5" class="form-label">Discount</label>
    <input type="number"  class="form-control" name="DISCOUNT" min="0" max="85" value="<?= $produit['DISCOUNT'] ?>">

    <label for="inputPassword5" class="form-label">Description</label>
    <textarea  class="form-control" name="DESCRIPTION"><?= $produit['DESCRIPTION']   ?></textarea>

    <label for="inputPassword5" class="form-label">Image</label>
    <input type="file"  class="form-control" name="IMAGE">
    <img width="250" class="img img-fluid"  src="upload/produit/<?=$produit['IMAGE']  ?>"><br>
    <?php
      

    ?>
    <?php
    $categorie=$pdo->prepare('SELECT * from categorie');
    $categorie->execute();


    ?>
    <label  class="form-label">Catégorie</label>
    <select name="CATEGORIE" id="" class="form-control">
        <option>Choisissez une catégorie</option>
        <?php
        foreach($categorie as $categorie){
            if($produit['CATEGORIE']==$categorie['ID']){
                echo "<option selected value='".$categorie['ID']."'>".$categorie['LIBELLE']."</option>";

            }else{
                echo "<option selected value='".$categorie['ID']."'>".$categorie['LIBELLE']."</option>";
            }

            
        }

        ?>
        
        

    </select>
    
    
        
    <input type="submit" value="Modifier produit" class="btn btn-primary  my-2" name="MODIFIER">

    </form>
</div>
</body>
</html>