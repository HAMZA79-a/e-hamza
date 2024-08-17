<?php
session_start();
$connecte=false;
if(isset($_SESSION['UTILISATEUR'])){
    $connecte=true;
}


?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">HAMZAOUI</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Ajouter utilisateur</a>
        </li>
        <?php
        if($connecte){
            ?>
          
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ajouter_categorie.php">Ajouter catégorie</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="categories.php">Liste des catégorie</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="ajouter_produit.php">Ajouter produit</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="produits.php">Liste des produits</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="deconnexion.php">Déconnexion</a>
          </li>

        <?php
        }else{
            ?>
          <li class="nav-item">
          <a class="nav-link" href="connexion.php">Connexion</a>
          </li>
            
        <?php
        }
        ?>

        
        
        <li class="nav-item">
          <a class="nav-link" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>