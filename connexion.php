<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <?php include'include/nav.php' ?>
    <center><h2>Connexion</h2></center>
    
    <div class="container">
        <?php
        if(isset($_POST['CONNEXION'])){
            $login=$_POST['LOGIN'];
            $pwd=$_POST['PASSWORD'];
            if(!empty($login) && !empty($pwd)){
                require_once'include/database.php';
                $sqlstate=$pdo->prepare('SELECT * FROM utilisateur
                WHERE LOGIN=? AND PASSWORD=?');
                $sqlstate->execute(array($login,$pwd));
                if($sqlstate->rowCount()>=1){
                    
                    $_SESSION['UTILISATEUR']=$sqlstate->fetch();
                    header('location:admin.php');
                }else{
                    ?>
                    <div class="alert alert-danger my-2" role="alert">
                    Login ou password incorrectes</div>
                    <?php     
                }

            }else{
                ?>
             <div class="alert alert-danger my-2" role="alert">
             Login et password sont obligatoire</div>
             <?php
            }
        }


       ?>
    <form action="" method="post">

    <label for="inputPassword5" class="form-label">Login</label>
    <input type="text"  class="form-control" name="LOGIN" >
    
    <label for="inputPassword5" class="form-label">Password</label>
    <input type="password"  class="form-control" name="PASSWORD" >
        
    <input type="submit" value="Connexion" class="btn btn-primary  my-2" name="CONNEXION">

    </form>
</div>
</body>
</html>