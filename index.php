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
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <form action="result.php" method="GET">
                    <div class="form-group">
                        <label for="dateIn" class="oswald">Fecha de entrada:</label>
                        <input placeholder="aaaa-mm-dd" type="text" name="dateIn" class="form-control cuteInput oswald" required>
                    </div>
                    <div class="form-group">
                        <label for="dateIn" class="oswald">Fecha de entrada:</label>
                        <input placeholder="aaaa-mm-dd" type="text" name="dateOut" class="form-control cuteInput oswald" required>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="oswald">Número de personas:</label>
                        <input name="amount" placeholder="amount" type="number" class="form-control cuteInput oswald" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning btn-lg oswald"> BUSCAR </button>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
        </div>
    </body>
</html>