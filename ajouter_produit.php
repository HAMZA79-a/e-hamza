<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter_produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    include'include/nav.php' ;
    require_once 'include/database.php';
    ?>
    <center><h2>Ajouter produit</h2></center>
    <div class="container">
        <?php
         if(isset($_POST['AJOUTER'])){
            $libelle=$_POST['LIBELLE'];
            $prix=$_POST['PRIX'];
            $discount=$_POST['DISCOUNT'];
            $categorie=$_POST['CATEGORIE'];
            $description=$_POST['DESCRIPTION'];
            $categorie=$_POST['CATEGORIE'];
            $date=date('Y-m-d');
            
            $filename='produit1.png';
            if(!empty($_FILES['IMAGE']['name'])){
                $image=$_FILES['IMAGE']['name'];
                $filename=uniqid().$image;
                move_uploaded_file($_FILES['IMAGE']['tmp_name'],'upload/produit/'.$filename);

               

                
            }

            if(!empty($libelle) && !empty($prix) && !empty($categorie)){
                $sqlstate=$pdo->prepare('INSERT INTO produit VALUES(null,?,?,?,?,?,?,?)');
                $sqlstate->execute([ $libelle,$prix,$discount,$date,$categorie,$description,$filename]);
                header('location:produits.php');
                ?>
                
                <?php
            }else{
                ?>
                <div class="alert alert-danger my-2" role="alert">
                Libelle ,prix et catégorie sont obligatoires</div>
                <?php

                
            }
         }
        

        ?>



        
    
    <form action="" method="post" enctype="multipart/form-data">

    <label for="inputPassword5" class="form-label">Libelle</label>
    <input type="text"  class="form-control" name="LIBELLE" >
    
    <label for="inputPassword5" class="form-label">Prix</label>
    <input type="number"  class="form-control" name="PRIX" min="0" step="0.5">

    <label for="inputPassword5" class="form-label">Discount</label>
    <input type="number"  class="form-control" name="DISCOUNT" min="0" max="85">

    <label for="inputPassword5" class="form-label">Description</label>
    <textarea  class="form-control" name="DESCRIPTION"></textarea>

    <label for="inputPassword5" class="form-label">Image</label>
    <input type="file"  class="form-control" name="IMAGE">
    <?php
    $categorie=$pdo->prepare('SELECT * from categorie');
    $categorie->execute();


    ?>
    <label  class="form-label">Catégorie</label>
    <select name="CATEGORIE" id="" class="form-control">
        <option>Choisissez une catégorie</option>
        <?php
        foreach($categorie as $categorie){
            echo "<option value='".$categorie['ID']."'>".$categorie['LIBELLE']."</option>";
        }

        ?>
        
        

    </select>
    
    
        
    <input type="submit" value="Ajouter produit" class="btn btn-primary  my-2" name="AJOUTER">

    </form>
</div>
</body>
</html>