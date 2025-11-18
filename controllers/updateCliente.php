<?php
session_start();

$isAdmin = ($_SESSION['usuario'] ?? '') === 'admin';

// Datos del formulario
$nombre = $_POST['nombre'] ?? '';
$user = $_POST['user'] ?? '';
$password = $_POST['password'] ?? '';

if ($isAdmin) {
    // Admin: recibe id
    $id = $_POST['id'] ?? null;
    if ($id === null || !isset($_SESSION['clientes'][$id])) {
        echo "Error: Cliente no encontrado";
        exit;
    }
    $_SESSION['clientes'][$id]['nombre'] = $nombre;
    $_SESSION['clientes'][$id]['user'] = $user;
    $_SESSION['clientes'][$id]['password'] = $password;

    // Redirigir al listado de admin
    header("Location: ../views/mainAdmin.php");
    exit;
} else {
    // Cliente normal: actualiza su propio registro
    if (!isset($_SESSION['cliente'])) {
        echo "Error: Cliente no encontrado";
        exit;
    }
    $_SESSION['cliente']['nombre'] = $nombre;
    $_SESSION['cliente']['user'] = $user;
    $_SESSION['cliente']['password'] = $password;

    // Redirigir al mainCliente
    header("Location: ../views/mainCliente.php");
    exit;
}
