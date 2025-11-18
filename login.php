<?php
session_start();

// Recogemos los datos del formulario
$usuario = $_POST['usuario'] ?? '';
$contraseña = $_POST['password'] ?? '';

// Definimos clientes de ejemplo
$clientes = [
    ['id' => 1, 'nombre' => 'Marc', 'gmail' => 'maralcban@alu.edu.gva.es', 'user' => 'usuario', 'password' => 'usuario'],
    ['id' => 2, 'nombre' => 'Pedro', 'gmail' => 'pedritopedro11@gmail.com', 'user' => 'usuario', 'password' => 'usuario'],
    ['id' => 3, 'nombre' => 'Luis', 'gmail' => 'luisignacio32@gmail.com', 'user' => 'usuario', 'password' => 'usuario']
];

// Definimos soportes de ejemplo
$soportes = [
    ['id' => 1, 'titulo' => 'Matrix', 'tipo' => 'DVD'],
    ['id' => 2, 'titulo' => 'Star Wars', 'tipo' => 'Blu-ray'],
    ['id' => 3, 'titulo' => 'Interstellar', 'tipo' => 'DVD']
];

// Comprobamos login
if (($usuario === 'admin' && $contraseña === 'admin') ||
    ($usuario === 'usuario' && $contraseña === 'usuario')) {

    $_SESSION['usuario'] = $usuario;

    if ($usuario === 'admin') {
        $_SESSION['clientes'] = $clientes;
        $_SESSION['soportes'] = $soportes;
        header("Location: views/mainAdmin.php");
        exit;
    }

    if ($usuario === 'usuario') {
        // Guardamos **solo el primer cliente** con user = 'usuario' en sesión
        foreach ($clientes as $c) {
            if ($c['user'] === 'usuario') {
                $_SESSION['cliente'] = $c;
                break;
            }
        }
        header("Location: views/mainCliente.php");
        exit;
    }

} else {
    header("Location: index.php?error=1");
    exit;
}
