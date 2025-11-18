<?php
session_start();

// Solo el administrador puede acceder
if (!isset($_SESSION['usuario']) || ($_SESSION['usuario']) !== 'admin') {
    header("Location: index.php");
    exit;
}

// Guardar mensaje de error si existe y luego eliminarlo de la sesión
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Cliente</title>
</head>
<body>

<!-- Mostrar mensaje de error si existe -->
<?php if ($error): ?>
    <p style="color:red;"><strong><?php echo $error; ?></strong></p>
<?php endif; ?>

<form action="../controllers/createCliente.php" method="POST">
    <label><strong>Nombre:</strong><input type="text" name="nombre" required></label><br><br>
    <label><strong>Usuario:</strong><input type="text" name="usuario" required></label><br><br>
    <label><strong>Contraseña:</strong><input type="text" name="password" required></label><br><br>
    <label><strong>Gmail:</strong><input type="text" name="gmail" required></label><br><br>
    <button type="submit">Crear Cliente</button>
</form>

<p><a href="mainAdmin.php">Volver al listado de clientes</a></p>
</body>
</html>
