<?php
    
    $registerFail = FALSE;
    if (isset($_POST['submit'])){
        require_once ('db/db_manager.php');
        require_once ('model/customer.php');
       
        $user = new Customer ($_POST['name'], $_POST['surname'], $_POST['dni'], $_POST['email'], $_POST['phone'], $_POST['cardNumber'], sha1($_POST['password']));
            
        if (insertUser ($user)){
            session_start();

            $_SESSION["user"] = $user;
            header('Location: index.php');
        }
        else{
            $registerFail = TRUE;
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
                <h1 class="oswald"> ~ GRAND HOTEL BUDAPEST ~</h1>
                <h2 class="amatic">Pase sus vacaciones con nosotros.</h2>
               
        </div>
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dateIn" class="oswald">NOMBRE:</label>
                                <input placeholder="Tyler" type="text" name="name" class="form-control oswald" required>
                            </div>
                            <div class="form-group">
                                <label for="dateIn" class="oswald">APELLIDOS:</label>
                                <input placeholder="Durden" type="text" name="surname" class="form-control oswald" required>
                            </div>
                            <div class="form-group">
                                <label for="dateIn" class="oswald">DNI:</label>
                                <input placeholder="00000000x" type="text" name="dni" class="form-control oswald" required>
                            </div>
                            <div class="form-group">
                                <label for="dateIn" class="oswald">EMAIL:</label>
                                <input placeholder="tdurden@papersoap.com" type="text" name="email" class="form-control oswald" required>
                            </div>
                            <div class="form-group">
                                <label for="dateIn" class="oswald">TELÉFONO:</label>
                                <input placeholder="Tyler" type="text" name="phone" class="form-control oswald" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="dateIn" class="oswald">CONTRASEÑA:</label>
                                <input placeholder="Tyler" type="password" id ="password1" name="password" class="form-control oswald" required>
                            </div>
                            <div class="form-group">
                                <label for="dateIn" class="oswald">REPITE LA CONTRASEÑA: <span id="warning"> <!-- JS --> </span> </label>
                                <input placeholder="Tyler" 
                                       type="password" 
                                       name="password2" 
                                       id ="password2"
                                       class="form-control oswald" 
                                       onchange="checkPasswords ();"
                                       required> 
                                       

                            </div>
                            <div class="form-group">
                                <label for="dateIn" class="oswald">TARJETA:</label>
                                <input placeholder="Tyler" type="text" name="cardNumber" class="form-control oswald" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-warning btn-lg oswald"> REGISTRARME </button>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
        </div>
    </body>
</html>
<script src="js/passwordChecker.js"></script>
<?php 
if ($registerFail){ 
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
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p style="color:red">El usuario ya existe</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>