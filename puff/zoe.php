<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
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

        ?>
    <form method="POST">
        <h1>Welcome, i´m Zoe </h1> 
       <p>Completa las casillas de past simple</p>
       <img src="https://img.freepik.com/vector-premium/nina-escuela-escritorio-escuela-levanto-mano_88114-89.jpg" alt="400" width="400">
       1. My granny <input name="respuesta1" type="text" required> (break) her leg last week.
       <br>
       2. I <input name="respuesta2" type="text" required> (not watch) the match on tv at 9 o¨clock.
       <br>
       3.I <input name="respuesta3" type="text" required> (hear) a noise, while i (do)<input name="respuesta4" type="text" required> my homework.
       <br>
       4. What time <input name="respuesta5" type="text" required>your parents <input name="respuesta6" type="text" required> (get) home last night?
       <br>
       5. What <input name="respuesta7" type="text" required> you <input name="respuesta8" type="text" required>(do) this time last friday?
       <br>
       6. my mum <input name="respuesta9" type="text" required>(prepare) lunch while my brother and i <input name="respuesta10" type="text" required> (do) the homework.
       <br>
       7 My father <input name="respuesta11" type="text" required>(water) the plants in the garden last weekend.
       <br>
       8. i <input name="respuesta12" type="text" required>(have) a shower, when someone <input name="respuesta13" type="text" required>(knock) on the door.
       <br>
       9. We <input name="respuesta14" type="text" required> (go) to the cinema last weekend.
        <br>
       <button name="enviar" type="submit" class="btn btn-primary" onclick="commentBox();">Enviar</button>

    </form>

    <?php
        $servidor = "localhost";
        $usuario = "carlos";
        $clave = "1234";
        $base = "eco3_ingles";
        $conexion = mysqli_connect($servidor, $usuario, $clave, $base);

     

        if(isset($_POST['enviar'])){
            $persona = $nick;

        $sql = "INSERT INTO juego_zoe (respuesta, persona) VALUES (?, ?)";

        $stmt = mysqli_prepare($conexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $respuesta, $persona);

            $respuestas = [
                $_POST['respuesta1'],
                $_POST['respuesta2'],
                $_POST['respuesta3'],
                $_POST['respuesta4'],
                $_POST['respuesta5'],
                $_POST['respuesta6'],
                $_POST['respuesta7'],
                $_POST['respuesta8'],
                $_POST['respuesta9'],
                $_POST['respuesta10'],
                $_POST['respuesta11'],
                $_POST['respuesta12'],
                $_POST['respuesta13'],
                $_POST['respuesta14']
            ];

            foreach ($respuestas as $respuesta) {
                mysqli_stmt_execute($stmt);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
        }
          // Redireccionar a otra página
        header("Location: index.php");
    }
        
    ?>

    <a href="index.php">
        <button type="button">Atras</button>
    </a>


</body>
</html>
