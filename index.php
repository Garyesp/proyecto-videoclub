<?php

// Controlador de cookies
require_once 'controllers/cookieController.php';
$cookieCtrl = new CookieController();

// Procesar cookies si se envió el formulario - DEBE IR ANTES DE CUALQUIER HTML
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion'])) {
    $cookieCtrl->procesarFormulario();
    header("Location: index.php");
    exit;
}

// Incluir el controlador del contador
require_once 'controllers/contadorController.php';
$contadorCtrl = new ContadorController();

// Manejar reinicio
if (isset($_GET['reiniciar'])) {
    $datosContador = $contadorCtrl->reiniciarContador();
} else {
    $datosContador = $contadorCtrl->obtenerContador();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videoclub 3.0</title>
</head>
<body>
    <!-- formulario -->
    <form action="login.php" method="POST">
        <p>Usuario: <input type="text" name="usuario"></p>
        <p>Password: <input type="password" name="password"></p>
        <button type="submit">Entrar</button>
    </form>

    <?php
    if (isset($_GET['error'])) {
        echo "Usuario o contraseña incorrectos";
    }
    
    // INCLUIR VISTA DEL CONTADOR
    include 'views/contadorVisitas.php';
    
    // INCLUIR VISTA DE COOKIES
    include 'views/cookieBanner.php';
    ?>
</body>
</html>