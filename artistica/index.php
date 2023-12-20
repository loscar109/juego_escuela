<!DOCTYPE html>
<html lang="en">
<head>
    <link src="/Users/Alumno/Desktop/messi/index/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproductor de MP3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<a href="../Menu_principal.php">
        <button>Atras</button>
    </a>
    <?php
    //CONEXION A LA BASE DE DATOS
    $servidor = "localhost";
    $usuario = "carlos";
    $clave = "1234";
    $base = "eco3_ingles";
    $conexion = mysqli_connect($servidor, $usuario, $clave, $base);

    //SELECCIONAR LOS DATOS
    $sql = "SELECT * FROM artistica";
    $consulta = mysqli_query($conexion, $sql);

    //MOSTRAR LOS DATOS
    if (mysqli_num_rows($consulta) > 0) {
        $contador = 0;
        while ($fila = mysqli_fetch_assoc($consulta)) {
            $contador++;
            echo "<div class='carta1' center-card>
                    <br> 
                    <div  class='card' style='width: 18rem;'>
                        <a href='https://postimages.org/' target='_blank'>
                            <img src='" . $fila['foto'] . "' alt='descarga-1' width='250' height='250'/>
                        </a>
                        <div class='card-body'>
                            <div class='card-body'>
                                <h1 class='card-title'></h1>  
                                <h1>
                                    <a href='javascript:mostrar" . $contador . "();'></a>
                                </h1>
                                <div id='abrir" . $contador . "' style='display:none;'>
                                    <div  class='contenedor2'>
                                        <h1></h1>
                                        <audio id='audioPlayer' controls>
                                            <source src='" . $fila['audio'] . "' type='audio/mpeg'>
                                            Tu navegador no soporta la reproducción de audio.
                                        </audio> 
                                        <p>" . $fila['pregunta'] . "</p>
                                        <form type='get'>
                                            <label>
                                                <input type='radio' name='" . $fila['respuesta1'] . "' value='0'> " . $fila['opcion1'] . "
                                            </label>  
                                            <label>
                                                <input type='radio' name='" . $fila['respuesta2'] . "' value='0'> " . $fila['opcion2'] . "
                                            </label> 
                                            <label>
                                                <input type='radio' name='" . $fila['respuesta3'] . "' value='0'> " . $fila['opcion3'] . "
                                            </label>  
                                            <br>
                                            <br>
                                            <br>
                                            <div>
                                                <button name='enviar' type='submit' class='btn btn-warning'>Enviar Respuestas</button>
                                            </div>
                                        </form>
                                        <p id='resultado'></p>
                                    </div> 
                                    <div id='close'>
                                        <a href='javascript:cerrar" . $contador . "();'></a>
                                    </div> 
                                </div>
                            </div>
                        </div>

                        <div class='btn-group' role='group' aria-label='Basic outlined example'>
                            <h1>
                                <a href='javascript:mostrar" . $contador . "();'>
                                    <button type='button' class='btn btn-outline-primary'>Mostrar</button>
                                </a>
                            </h1>
                            <h1>
                                <a href='javascript: cerrar" . $contador . "();'>
                                    <button type='button' class='btn btn-outline-primary'>Cerrar</button>
                                </a>
                            </h1>
                        </div>
                    </div>
                </div>";

            if (isset($_GET['enviar'])) {
                $dato1 = $fila['respuesta1'];
                $dato2 = $fila['respuesta2'];
                $dato3 = $fila['respuesta3'];
                $insertar = "INSERT INTO respuestas (participante, respuesta1, respuesta2, respuesta3) VALUES ('JUAN','$dato1','$dato2', '$dato3')";
                mysqli_query($conexion, $insertar);
            }
        }   
    } else {
        die("Error: No hay datos en la tabla seleccionada");
    }
    //CERRAR LA CONEXION
    mysqli_close($conexion);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script language="javascript" src="js/eventos.js"></script>
</body>
</html>
