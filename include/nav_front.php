<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HAMZAOUI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Liste des catégorie</a>
        </li>
       
        

        
          
       
      </ul>
    </div>
    <?php
    $idUtilisateur=$_SESSION['UTILISATEUR']['ID'];
    // var_dump($_SESSION['panier'][$idUtilisateur]);

    ?>
    <a href="panier.php" class="btn float-end"><i class="fa-sharp-duotone fa-solid fa-cart-shopping"></i>Panier <?php echo count($_SESSION['panier'][$idUtilisateur]) ;   ?></a>
  </div>
</nav>
    
</body>
</html>
