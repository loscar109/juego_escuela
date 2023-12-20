<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultado tincho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<?php

        // Iniciar sesión
        session_start();

        // Verificar si la variable de sesión 'nick' está establecida
        if(isset($_SESSION['nick'])){
            $nick = $_SESSION['nick'];
            //echo "<h2> Bienvenido,<b> $nick </b>, elige un aula para empezar a jugar: </h2>";
        } else {
            // Si no está establecida, redirigir al usuario a la página de inicio de sesión
            header("Location: index.php");
            exit();
        }  


             $servidor = "localhost";
             $usuario = "carlos";
             $clave = "1234";
             $base = "eco3_ingles";
             $conexion = mysqli_connect($servidor, $usuario, $clave, $base);
         
             $sql="SELECT * FROM juego_zoe WHERE persona='$nick'";
             $consulta = mysqli_query($conexion,$sql);

             $sql2="SELECT * FROM puff_zoe";
             $consulta2 = mysqli_query($conexion,$sql2);

            
              //MOSTRAR LOS DATOS
    if (mysqli_num_rows($consulta) > 0) {
        while ($fila = mysqli_fetch_assoc($consulta)) {
            echo "<table class='table'>

                    <tbody>
                        <tr>
                            <td>" . $fila['respuesta'] . "</td>";
                            while ($fila2 = mysqli_fetch_assoc($consulta2)) {
                                echo "<td>" . $fila2['respuesta'] . "</td>";   
                            }
                            
                            
                        echo "</tr>   
                    </tbody>
                   </table>";
        }
    }
            


        ?>
    
    <a href="index.php">Volver</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>