<?php
session_start();

// Determinar si es admin o cliente normal
$isAdmin = ($_SESSION['usuario'] ?? '') === 'admin';

// Si es admin, esperamos un ID del cliente por GET
if ($isAdmin) {
    if (!isset($_GET['id'])) {
        header("Location: mainAdmin.php");
        exit;
    }
    $id = $_GET['id'];
    $cliente = $_SESSION['clientes'][$id] ?? null;
    if (!$cliente) {
        echo "Error: Cliente no encontrado";
        exit;
    }
} else {
    // Cliente normal: editamos sus propios datos
    $cliente = $_SESSION['cliente'] ?? null;
    if (!$cliente) {
        echo "Error: Cliente no encontrado";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body>
<h1>Editar Cliente</h1>

<form action="../controllers/updateCliente.php" method="POST">
    <?php if ($isAdmin): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <?php endif; ?>
    
    <p>Nombre: <input type="text" name="nombre" value="<?= htmlspecialchars($cliente['nombre']) ?>"></p>
    <p>Usuario: <input type="text" name="user" value="<?= htmlspecialchars($cliente['user']) ?>"></p>
    <p>Contraseña: <input type="password" name="password" value="<?= htmlspecialchars($cliente['password']) ?>"></p>

    <button type="submit">Guardar cambios</button>
</form>
</body>
</html>
