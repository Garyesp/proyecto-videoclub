<?php
session_start();

/* Recogemos los datos del formulario */
$usuario = $_POST['usuario'] ?? '';
$contraseña = $_POST['password'] ?? '';

/* Compruebo los datos del usuario */
if (($usuario == "admin" && $contraseña == "admin") ||
    ($usuario == "usuario" && $contraseña == "usuario")) {

    /* Si son ciertos, guardo el usuario en la sesión */
    $_SESSION['usuario'] = $usuario;

    if ($usuario == "admin") {
        /* Definimos clientes de ejemplo */
        $_SESSION['clientes'] = [
            ['id' => 1, 'nombre' => 'Marc', 'gmail' => 'maralcban@alu.edu.gva.es'],
            ['id' => 2, 'nombre' => 'Pedro', 'gmail' => 'pedritopedro11@gmail.com'],
            ['id' => 3, 'nombre' => 'Luis', 'gmail' => 'luisignacio32@gmail.com']
        ];

        /* Definimos soportes de ejemplo */
        $_SESSION['soportes'] = [
            ['id' => 1, 'titulo' => 'Matrix', 'tipo' => 'DVD'],
            ['id' => 2, 'titulo' => 'Star Wars', 'tipo' => 'Blu-ray'],
            ['id' => 3, 'titulo' => 'Interstellar', 'tipo' => 'DVD']
        ];

        /* Redirigimos a la página principal del admin */
        header("Location: views/mainAdmin.php");
        exit;
    }

    if ($usuario == "usuario") {
        /* Vista para los usuarios (NO admins) */
        header("Location: views/mainCliente.php");
        exit;
    }

} else {
    /* Usuario incorrecto, volvemos al login con error */
    header("Location: index.php?error=1");
    exit;
}
