<?php

$porcentaje = $_POST['porcentaje'];

//Porcentaje (%) de error entre valor real (matematico) y el valor aproximado obtenido de la simulación

$Porcentaje_error = (abs ($porcentaje - 24) / 24) * 100;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Método de Monte Carlo</title>

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdn.plot.ly/plotly-2.6.3.min.js"></script>
</head>
<body>

    <div class="col s12 m8 offset-m2 l6 offset-l3">
        <form class="col s12" action="index.php" method="post">
            <div class="card-panel pink lighten-4">
                <b>Método de Monte Carlo: </b><br><br>

                <div class="card-panel pink lighten-5 z-depth-1">
                    <div class="row valign-wrapper">
                        <span class="black-text">

                            • Porcentaje (%) de error entre valor real (matematico) y el valor aproximado obtenido de la simulación: 

                            <?php

                            echo '<b>' . $Porcentaje_error . '% </b>';

                            ?>

                        </span>  
                    </div>
                </div>

                <button class="btn waves-effect waves-light white black-text" type="submit" name="action">Inicio</button>
            </div>
        </form>  
    </div>
          
    <!--SCRIPT-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://kit.fontawesome.com/d6ff169d2d.js" crossorigin="anonymous"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });

    </script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems,{
                duration: 500,
                indicators: true,
                fullWidth: true
            });
        });

    </script>
</body>
</html>