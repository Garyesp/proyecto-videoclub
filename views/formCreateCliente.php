<?php
session_start();

if (!isset($_SESSION['usuario']) || ($_SESSION['usuario']) !== 'admin') {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../controllers/createCliente.php" method="POST">
        <label><strong>Nombre:</strong><input type="text" name="nombre" required></label><br>
        <br>
        <label><strong>Usuario:</strong><input type="text" name="usuario" required></label><br>
        <br>
        <label><strong>Contraseña:</strong><input type="text" name="password" required></label><br>
        <br>
        <label><strong>Gmail:</strong><input type="text" name="gmail" required></label><br>
        <br>
        <button type="submit">Crear Cliente</button>
    </form>

    <p><a href="mainAdmin.php">Volver al listado de clientes</a></p>
</body>

</html>