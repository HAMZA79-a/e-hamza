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
    <center><h2>Modifier categorie</h2></center>
    <div class="container">
        <?php
        require_once 'include/database.php';
        $id=$_GET['id'];
        $sqlstate=$pdo->prepare('SELECT *FROM categorie WHERE ID=?');

        $sqlstate->execute([$id]);
        $categorie=$sqlstate->fetch(PDO::FETCH_ASSOC);
        if(isset($_POST['MODIFIER'])){
            $libelle=$_POST['LIBELLE'];
            $description=$_POST['DESCRIPTION'];
            if(!empty($libelle) && !empty($description)){
                $sqlstate=$pdo->prepare('UPDATE categorie SET LIBELLE=?,DESCRIPTION=? WHERE ID=?');
                $sqlstate->execute([$libelle,$description,$id]);
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
    
    
    <input type="hidden"  class="form-control" name="ID" value="<?php echo $categorie['ID'];   ?>" >
     
    <label for="inputPassword5" class="form-label">Libelle</label>
    <input type="text"  class="form-control" name="LIBELLE" value="<?php echo $categorie['LIBELLE'];   ?>" >
    
    <label for="inputPassword5" class="form-label">Discription</label>
    <textarea name="DESCRIPTION" class="form-control" ><?php echo $categorie['DESCRIPTION'];   ?></textarea>
    
        
    <input type="submit" value="Modifier categorie" class="btn btn-primary  my-2" name="MODIFIER">

    </form>
</div>
</body>
</html>