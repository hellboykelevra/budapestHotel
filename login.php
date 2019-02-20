<?php 
    $loginFail = FALSE;
    if (isset($_POST['submit'], $_POST['email'], $_POST['password'])){
        require_once ('db/db_manager.php');
        require_once ('model/customer.php');

        $password = sha1($_POST['password']);
        $user = getUser($_POST['email'], $password); 
        if ($user != null){
            session_start();

            $_SESSION["user"] = $user;
            header('Location: index.php');
        }
        else{
            $loginFail = TRUE;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Budapest Hotel </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Oswald" rel="stylesheet">
    </head>
    <body>
        <div class="jumbotron text-center">
                <h1> <i class="fas fa-hotel"></i> </h1>
                <a href="index.php">
                    <h1 class="oswald"> ~ GRAND HOTEL BUDAPEST ~</h1>
                </a>
                <h2 class="amatic">Pase sus vacaciones con nosotros.</h2>
                <?php 
                    session_start();
                    if (isset($_SESSION['user'])){
                        echo '<a href="register.php" class="btn btn-warning btn-lg oswald"> Salir </a>';
                    }
                    else{
                        echo '<div class="btn-group" role="group" aria-label="Basic example">
                        <a href="register.php" class="btn btn-warning btn-lg oswald"> Regístrate </a>
                        <a href=".php" class="btn btn-warning btn-lg oswald"> Entra </a>
                        </div>';
                    }
                ?>
                
        </div>
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-5"></div>
            <div class="col-sm-2">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                        <label for="email" class="oswald">Correo: </label>
                        <input placeholder="tucorreo@dominio.com" value="silver.correo@gmail.com" type="text" name="email" class="form-control cuteInput oswald" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="oswald">Fecha de entrada:</label>
                        <input type="password" value="1234" name="password" class="form-control cuteInput oswald" required>
                    </div>
                   
                    <br>
                    <button type="submit" name="submit" class="btn btn-warning btn-lg oswald"> Entrar </button>
                </form>
            </div>
            <div class="col-sm-5"></div>
        </div>
        </div>
    </body>
</html>
<?php 
if ($loginFail){ 
    echo '<script>
        $(document).ready(function(){
        $("#fail").modal();
        });
    </script>';
}
?>



<!-- SUCCESS MODAL -->
<div id="fail" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body">
        <p style="color:red">El usuario no existe en la base de datos</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>