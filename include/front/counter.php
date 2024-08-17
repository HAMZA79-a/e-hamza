<div>
        <?php
        
        $idUtilisateur=$_SESSION['UTILISATEUR']['ID'];
        $qty=$_SESSION['panier'][$idUtilisateur][$idProduit] ?? 0;
        $button=$qty == 0 ? 'Ajouter' : 'Modifier';
        ?>
        <form action="ajouter_panier.php" method="post" class="counter d-flex">
        <button onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</button>
        <input type="hidden" name="id" value="<?php  echo $idProduit;  ?>">
        <input class="form-control" type="number" name="QTY" id="QTY" value="<?php  echo $qty;  ?>" max="99">
        <button onclick="return false;" class="btn btn-primary mx-2 counter-plus" >+</button>
        <input type="submit" value="<?php echo $button ; ?>" name="AJOUTER" class="btn btn-success">
        </form>
</div>
