<?php
session_start();

// Solo el administrador puede crear clientes
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Obtener datos del formulario
$nombre = trim($_POST['nombre'] ?? '');
$usuario = trim($_POST['usuario'] ?? '');
$password = trim($_POST['password'] ?? '');
$gmail = trim($_POST['gmail'] ?? '');

// compruebo
if ($nombre === '' || $usuario === '' || $password === '' || $gmail === '') {
    $_SESSION['error'] = "Todos los campos son obligatorios.";
    header("Location: formCreateCliente.php");
    exit;
}

// Obtener clientes actuales de la sesión
$clientes = $_SESSION['clientes'] ?? [];

// Verificar que el usuario no exista
foreach ($clientes as $c) {
    if ($c['usuario'] === $usuario) {
        $_SESSION['error'] = "El usuario ya existe.";
        header("Location: formCreateCliente.php");
        exit;
    }
}

// Crear nuevo cliente como array asociativo
$nuevoCliente = [
    'nombre' => $nombre,
    'usuario' => $usuario,
    'password' => $password,
    'gmail' => $gmail
];

// Guardar el cliente en la sesión
$clientes[] = $nuevoCliente;
$_SESSION['clientes'] = $clientes;

// Redirigir a mainAdmin.php para ver el nuevo cliente
header("Location: ../views/mainAdmin.php");
exit;
