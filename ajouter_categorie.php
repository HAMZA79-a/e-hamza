<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter_categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include'include/nav.php' ?>
    <center><h2>Ajouter categorie</h2></center>
    <div class="container">
        <?php
        if(isset($_POST['AJOUTER'])){
            $libelle=$_POST['LIBELLE'];
            $description=$_POST['DESCRIPTION'];
            if(!empty($libelle) && !empty($description)){
                require_once 'include/database.php';
                $sqlstate=$pdo->prepare('INSERT INTO categorie(LIBELLE,DESCRIPTION) VALUES(?,?)');
                $sqlstate->execute([$libelle,$description]);
                header('location:categories.php');
                ?>
                
            <?php

            }else{
                ?>

                <div class="alert alert-danger my-2" role="alert">
                Libelle ,description sont obligatoires</div>

                <?php
            }
        }

        ?>



        
    
    <form action="" method="post">

    <label for="inputPassword5" class="form-label">Libelle</label>
    <input type="text"  class="form-control" name="LIBELLE" >
    
    <label for="inputPassword5" class="form-label">Discription</label>
    <textarea name="DESCRIPTION" class="form-control" ></textarea>
    
        
    <input type="submit" value="Ajouter categorie" class="btn btn-primary  my-2" name="AJOUTER">

    </form>
</div>
</body>
</html>