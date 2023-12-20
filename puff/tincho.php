<!DOCTYPE html>
<html>
<head>
<h1>Hi, i'm tincho, i need your help</h1>
<h2>Describe what are doing</h2>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>audio</title>
</head>
<body>
   
<audio controls autoplay >
       <source src="Audio-de-Luz.ogx" type="audio/mpeg">
</audio>
</body>
</html>
<p>My work has become very complicated, i don`t understand the past simple, it`s very difficult!</p>
<img src="https://png.pngtree.com/png-clipart/20210701/ourlarge/pngtree-cartoon-stationery-grey-task-book-png-image_3433310.jpg" alt="80" width="400">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,
initial-scale=1.0, shrink-to-fit=no">
<title>Comentarios</title>
<link rel=".js" >
<link rel="stylesheet" href="assets/css/styles.css">
<div class="container">

<div class="col-md-6 pane">
<div class="col-md-4">

<div class="alert alert-light"><h4>Coment</h4></div>
</div>
<div id="result">

</div>
<div class="col-md-8">
    <form method="POST">
        <div class="form-group">
            <div class="form-group">
                <label>Comentario</label>
                    <textarea name="respuesta" id="comment" class="form-control"></textarea>
                </label>
            </div>
            <button name="enviar" type="submit" class="btn btn-primary" onclick="commentBox();">Enviar</button>
        </div>
    </form>
    <a href="index.php">
        <button type="button">Atras</button>
    </a>
</div>

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
        $correcta = "Mi trabajo se ha vuelto muy complicado, no entiendo el pasado simple, es muy dificil";
        $respuesta = $_POST['respuesta'];
        $sql = "INSERT INTO juego_tincho (respuesta, persona, correcta) VALUES ('$respuesta', '$persona', '$correcta')";
        $consulta=mysqli_query($conexion,$sql);


      // Redireccionar a otra página
    header("Location: index.php");
}
    
?>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="audioindex.html">
<script src="assets/js/script.js"></script>
<img src="data:image/jpeg;base64,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" alt="">
</div>
</div>
</body>
</html>
