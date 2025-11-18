<?php
session_start();

$isAdmin = ($_SESSION['usuario'] ?? '') === 'admin';

$nombre = $_POST['nombre'] ?? '';
$user = $_POST['user'] ?? '';
$password = $_POST['password'] ?? '';
$id = $_POST['id'] ?? null;

if ($id === null) {
    echo "Error: ID inválido";
    exit;
}

// Buscar y actualizar el cliente en la sesión
$encontrado = false;

// Primero recorremos $_SESSION['clientes'] si existe
if (isset($_SESSION['clientes'])) {
    foreach ($_SESSION['clientes'] as $index => $cliente) {
        if ($cliente['id'] == $id) {
            $_SESSION['clientes'][$index]['nombre'] = $nombre;
            $_SESSION['clientes'][$index]['user'] = $user;
            $_SESSION['clientes'][$index]['password'] = $password;

            // Si es cliente normal, también actualizar su propia sesión
            if (!$isAdmin) {
                $_SESSION['cliente'] = $_SESSION['clientes'][$index];
            }

            $encontrado = true;

            if ($isAdmin) {
                header("Location: ../views/mainAdmin.php");
            } else {
                header("Location: ../views/mainCliente.php");
            }
            exit;
        }
    }
}

// Si no se encontró en $_SESSION['clientes'], actualizar directamente $_SESSION['cliente'] (cliente normal)
if (!$encontrado && !$isAdmin && isset($_SESSION['cliente']) && $_SESSION['cliente']['id'] == $id) {
    $_SESSION['cliente']['nombre'] = $nombre;
    $_SESSION['cliente']['user'] = $user;
    $_SESSION['cliente']['password'] = $password;

    header("Location: ../views/mainCliente.php");
    exit;
}

echo "Error: Cliente no encontrado";
exit;
