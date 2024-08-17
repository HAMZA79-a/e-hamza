<?php
session_start();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"  rel="stylesheet">
</head>
<body>
<?php include'../include/nav_front.php' ?>
<center><h2><i class="fa fa-light fa-list-ul"></i> Liste des catégorie</h2></center>
<div class="container">
    <?php 
      require_once '../include/database.php';
      $categories=$pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
     

    ?>
<ul class="list-group w-25">
    <?php foreach($categories as $categorie){
        ?>
        <li class="list-group-item">
            <a class="btn btn-light " href="categorie.php?id=<?php echo $categorie['ID'] ?>">
                <?php echo $categorie['LIBELLE'] ?>
        
            </a>
            
        </li>
        <?php

    }
    ?>

</ul>
    
</div>
</body>
</html>