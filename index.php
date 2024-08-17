<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include'include/nav.php' ?>
    <center><h2>Ajouter utilisateur</h2></center>
    <div class="container">
        
    <?php
    if(isset($_POST['AJOUTER'])){
      $login=$_POST['LOGIN'];
      $pwd=$_POST['PASSWORD'];
      if(!empty($login) && !empty($pwd)){
      require_once 'include/database.php';  
      $date=date('Y-m-d');
      $sqlstate=$pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?)');
      $sqlstate->execute(array($login,$pwd,$date));
      header('location:connexion.php');
      }else{
        ?>
        <div class="alert alert-danger my-2" role="alert">
             Login et Password sont obligatoire</div>
        <?php
        
        }
   }

    ?>
    <form action="" method="post">

    <label for="inputPassword5" class="form-label">Login</label>
    <input type="text"  class="form-control" name="LOGIN" >
    
    <label for="inputPassword5" class="form-label">Password</label>
    <input type="password"  class="form-control" name="PASSWORD" >
        
    <input type="submit" value="Ajouter Utilisateur" class="btn btn-primary  my-2" name="AJOUTER">

    </form>
</div>
</body>
</html>