<?php
session_start();

// Solo admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

// Verificamos que venga el ID del cliente
$id = $_GET['id'] ?? null;

if ($id !== null) {
    // Buscamos el cliente por su ID
    foreach ($_SESSION['clientes'] as $index => $cliente) {
        if ($cliente['id'] == $id) {
            // Eliminamos el cliente
            unset($_SESSION['clientes'][$index]); 
            $_SESSION['clientes'] = array_values($_SESSION['clientes']); 
            break;
        }
    }
}

// Redirigimos al listado de clientes
header("Location: ../views/mainAdmin.php");
exit;
