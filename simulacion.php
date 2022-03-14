<?php

$cont = 0; //Contador

$simulaciones = $_POST["simulaciones"];
$limite1_usuario = $_POST["limite1"];
$limite2_usuario = $_POST["limite2"];

$resultados = [$simulaciones]; //Se declara el arreglo

//Evaluando el Resultado Matemático de la integral (Límites: 3 - 2):
$L1 = 3; //Límites originales de la integral
$L2 = 2;

$X1_3 = pow($L1, 3); //Evaluando el valo9r se eleva a los exponentes de la integral (3 y 2)
$X1_2 = pow($L1, 2);
$X2_3 = pow($L2, 3);
$X2_2 = pow($L2, 2);

$resultado_matematico_integral = ($X1_3 + $X1_2) - ($X2_3 + $X2_2); //Procedimiento para obtener el resultado

//Evaluando el Resultado Aproximado de la Integral por el metodo de Monte Carlo:

for ($i = 0; $i < $simulaciones; $i++) { //De una vez se agregan los valores al arreglo
    $N_aleatorio_L1 = rand($limite1_usuario, $limite2_usuario); //Se generan los números aleatorios
    $N_aleatorio_L2 = rand($limite1_usuario, $limite2_usuario);
    
    $N1_3 = pow($N_aleatorio_L1, 3);
    $N1_2 = pow($N_aleatorio_L1, 2);
    $N2_3 = pow($N_aleatorio_L2, 3);
    $N2_2 = pow($N_aleatorio_L2, 2);
    
    $resultado_monteCarlo_integral = ($N1_3 + $N1_2) - ($N2_3 + $N2_2); //Procedimiento para obtener el resultado
    $resultados[$i] = $resultado_monteCarlo_integral; //Se agrega cada resultado al arreglo
}

//Porcentaje (%) de error entre valor real (matematico) y el valor aproximado obtenido de la simulación
$Valor_aprox = 24;
$Porcentaje_error = (abs ($Valor_aprox - $resultado_matematico_integral) / $resultado_matematico_integral) * 100;

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
                                
                                • Resultado matemático de la integral: <?php echo $resultado_matematico_integral ?><br><br>

                                • Resultado aproximado de la integral por el Método de Monte Carlo</b>: <?php echo $resultado_monteCarlo_integral ?><br><br>
                                
                                • Resultados aleatorios obtenidos del número de simulaciones (
                                    <?php

                                    echo $simulaciones;

                                    ?>
                                ): <br>

                                <?php 

                                for ($i = 0; $i < $simulaciones; $i++) {
                                    echo '<b>- Simulación #'. $i+1 .'</b> = '.+ $resultados[$i] . '<br>';
                                }
                                
                                ?><br>

                                • Porcentaje (%) de error entre valor real (matematico) y el valor aproximado obtenido de la simulación: 
                                
                                <?php

                                echo $Porcentaje_error;
                                
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