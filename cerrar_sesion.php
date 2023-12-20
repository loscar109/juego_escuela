<!-- cerrar_sesion.php -->

<?php
// Iniciar la sesión
session_start();

// Verificar si se hace clic en el botón 'cerrar_sesion'
if(isset($_POST['cerrar_sesion'])){
    // Destruir todas las variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión u otra página
    header("Location: index.php");
    exit();
}

// ... Resto del contenido de la página ...
?>