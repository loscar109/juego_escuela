<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <?php
            // Iniciar sesión
            session_start();

            // Verificar si la variable de sesión 'nick' está establecida
            if(isset($_SESSION['nick'])){
                $nick = $_SESSION['nick'];
                echo "<h2> Bienvenido,<b> $nick </b>, elige un aula para empezar a jugar: </h2>";
            } else {
                // Si no está establecida, redirigir al usuario a la página de inicio de sesión
                header("Location: index.php");
                exit();
            }   

        ?>
        <br><br>
        <img src="mapa-esim.png" width="1280px" height="720px" alt="">
        <br>
        <hr>
        <a href="artistica/index.php">
            <button class="btn btn-success">Artistica</button>
        </a>
        <a href="invernadero/index.html">
            <button class="btn btn-success">Invernadero</button>
        </a>
        <a href="laboratorio/index.html">
            <button class="btn btn-success">Laboratorio</button>
        </a>
        <!--<a href="maker/IDI-Maker-main/Aula-maker.html">
            <button class="btn btn-success">Maker</button>
        </a>-->
        <a href="polideportivo/polideportivo.html">
            <button class="btn btn-success">Polideportivo</button>
        </a>
        <a href="puff/index.php">
            <button class="btn btn-success">Puff</button>
        </a>
        <hr>
        <?php
             $servidor = "localhost";
             $usuario = "carlos";
             $clave = "1234";
             $base = "eco3_ingles";
             $conexion = mysqli_connect($servidor, $usuario, $clave, $base);
         
             //$sql = "select * from puntaje where persona = $nick";
             //$consulta = mysqli_query($conexion, $sql);

            
            


        ?>
        <hr>
        <form action="cerrar_sesion.php" method="post">
            <button class="btn btn-danger" type="submit" name="cerrar_sesion">Cerrar Sesión</button>
        </form>
        <hr>
        
       
    </div>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>