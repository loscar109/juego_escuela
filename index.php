<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <br><br><br><br>
    <form action="" method="post">
      <div class="container">
        <div class="card" style="width: 50rem; padding:50px; margin:200px">
          <div class="card-body">
            <h5 class="card-title">Hola, binvenido a los juegos ESIM, MAI (ECO3 - INGLES)</h5>
            <p class="card-text">Hola, nos puedes decir tu nombre</p> <input name="nick" type="text"> 
              <button type="submit" name="enviar" class="btn btn-primary">Ingresar</button>  
            </a>
          </div>
        </div>
      </div>
    </form>

  <?php
    $servidor = "localhost";
    $usuario = "carlos";
    $clave = "1234";
    $base = "eco3_ingles";
    $conexion = mysqli_connect($servidor, $usuario, $clave, $base);

    if(isset($_POST['enviar'])){
      $nick = $_POST['nick'];
      $insertar = "INSERT INTO jugador (nick) VALUES ('$nick')";
      mysqli_query($conexion, $insertar);

      // Iniciar sesión y almacenar el nombre del jugador en una variable de sesión
      session_start();
      $_SESSION['nick'] = $nick;

      // Redireccionar a otra página
      header("Location: Menu_principal.php");
    }
  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>