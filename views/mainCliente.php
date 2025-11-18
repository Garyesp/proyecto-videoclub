<?php
session_start();

// Verificamos que haya un usuario logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

// Cliente actual en sesión
$cliente = $_SESSION['cliente'] ?? null;

if (!$cliente) {
    echo "Error: Cliente no encontrado";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi perfil</title>
</head>
<body>
<h1>Hola, <?= htmlspecialchars($cliente['nombre']) ?>!</h1>

<p>Usuario: <?= htmlspecialchars($cliente['user']) ?></p>
<p>Correo: <?= htmlspecialchars($cliente['gmail']) ?></p>

<!-- Link para editar sus datos -->
<p><a href="formUpdateCliente.php">Editar mis datos</a></p>

<form action="../logout.php" method="POST">
    <button type="submit">Cerrar sesión</button>
</form>
</body>
</html>
