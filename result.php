<?php
    function debug ($msg, $color = 'red'){
        $style = 'style="color:'.$color.'"';
        echo '<p '.$style.'>'.$msg.'</p>';
    }

    function paintTable ($availableRooms){
        echo '<table class="table table-dark">';
        echo '<thead>';
        echo '<tr>
                <th> Número </th>  
                <th> Tipo </th>  
                <th> euros/noche </th>  
                <th> euros/noche </th>  
              </tr>';
        echo '</thead>';
        echo '</tbody>';
        while($row = $availableRooms->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row["roomNumber"].'</td>';
            echo '<td>'.$row["roomType"].'</td>';
            echo '<td>'.$row["roomPrice"].' € </td>';
            echo '<td><button type="button" class="btn btn-warning btn-sml" data-toggle="modal" data-target="#bookModal"> Reservar </button></td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
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
                          echo '<form action="logout.php" method="POST">
                                  <button type="submit" name="logout" class="btn btn-warning btn-lg oswald"> Salir </button>
                          </form>';
                      }
                      else{
                          echo '<div class="btn-group" role="group" aria-label="Basic example">
                          <a href="register.php" class="btn btn-warning btn-lg oswald"> Regístrate </a>
                          <a href="login.php" class="btn btn-warning btn-lg oswald"> Entra </a>
                          </div>';
                      }
                  ?>
                  
          </div>
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                
            </div>
            <div class="col-sm-8">
                <div class="panel">
                    <div class="panel-heading panel-default">
                        <h1 class="oswald"> RESULTADOS </h1>
                    </div>
                    <div class="panel-body">
                        <?php
                            if (isset($_GET['dateIn'], $_GET['dateOut'], $_GET['amount'])){
                                require_once('db/db_manager.php');
                                $dateIn = $_GET['dateIn'];
                                $dateOut = $_GET['dateOut'];
                                $amount = $_GET['amount'];
                                $availableRooms = getAvailableRooms ($dateIn, $dateOut, $amount);
                                paintTable($availableRooms);
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
        </div>
    </body>
</html>

 <!-- NOT REGISTER ROOM MODAL -->
 <div class="modal fade" id="bookModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <?php 
            if (isset($_SESSION['user'])){
              echo "<h1> ¿Desea confirmar la reserva?  </h1>";
            }
            else{
              echo '<h1 class="oswald">Regístrate para poder reservar</h1>';
            }
          ?>
        </div>
        <div class="modal-footer text-center">
          <?php 
              if (isset($_SESSION['user'])){
                echo "<button type='submit' class='btn btn-warning btn-lg'> Aceptar </button>";
              }
              else{
                echo '<a href="register.php" class="btn btn-warning btn-lg"> Registrarme </a>';
              }
            ?>
          
          <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>