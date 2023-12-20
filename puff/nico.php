<!DOCTYPE html>
<html>
<head>
   
</head>
<body>
   
   <h1>hello i`m Nico, i need your help, i have completed my work. </h1>
   <h2> Listening the music, find the past simple!</h2>
   <img src="https://img.freepik.com/vector-premium/nino-escuchando-musica-telefono-inteligente_97632-6341.jpg?w=2000" alt="300" width="300">
 <h2>Lyric</h2>
<h3>
    When she was just a girl, she expected the world
    <br>
    But it flew away from her reach
    <br>
    So she ran away in her sleep and dreamed of
    <br>
    Para-para-paradise, para-para-paradise, para-para-paradise
    <br>
    Every time she closed her eyes
    <br>
    When she was just a girl, she expected the world
    <br>
    But it flew away from her reach and the bullets catch in her teeth
    <br>
    Life goes on, it gets so heavy
    <br>
    The wheel breaks the butterfly, every tear a waterfall
    <br>
    In the night, the stormy night, she'd close her eyes
    <br>
    In the night, the stormy night, away she'd fly
    <br>
    And dream of para-para-paradise
    <br>
    Para-para-paradise
    <br>
    Para-para-paradise
    <br>
    She'd dream of para-para-paradise
    <br>
    Para-para-paradise
    <br>
    Para-para-paradise
    <br>
    La-la-la-la-la-la-la
    <br>
    La-la-la-la-la-la-la-la-la-la
    <br>
    And so lying underneath those stormy skies
    <br>
    She'd say, "oh
    <br>
    I know the sun must set to rise"
    <br>
    This could be para-para-paradise
    <br>
    Para-para-paradise
    <br>
    This could be para-para-paradise
    <br>
    (Oh-oh-oh-oh-oh, oh-oh-oh)
    <br>
    This could be para-para-paradise
    <br>
    Para-para-paradise
    <br>
    This could be para-para-paradise
    <br>
    (Oh-oh-oh-oh-oh, oh-oh)
    <br>
    This could be para-para-paradise
    <br>
    Para-para-paradise
    <br>
    This could be para-para-paradise
    <br>
    (Oh-oh-oh-oh-oh, oh-oh)
    <br>
    <link rel="stylesheet" href="https://youtu.be/DbVz0jP722g?si=RfeR3UuMuJBBtkLt">
    <p>Coldplay-paradise</p>
    <form method="post">
      <input type="loved" name="opcion1">
      <input type="loved" name="opcion2">
      <input type="loved" name="opcion3">
      <input type="loved" name="opcion4">
      <input type="loved" name="opcion5">

      <input name="enviar" type="submit">
    </form>
    <a href="index.php">
        <button type="button">Atras</button>
    </a>

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

     

        if(isset($_POST['enviar'])){
            $persona = $nick;

        $sql = "INSERT INTO juego_nico (respuesta, persona) VALUES (?, ?)";

        $stmt = mysqli_prepare($conexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $respuesta, $persona);

            $respuestas = [
                $_POST['opcion1'],
                $_POST['opcion2'],
                $_POST['opcion3'],
                $_POST['opcion4'],
                $_POST['opcion5']
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


</html>
