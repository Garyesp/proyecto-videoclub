<?php
session_start();

// Solo admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$clientes = $_SESSION['clientes'] ?? [];
$soportes = $_SESSION['soportes'] ?? [];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Admin</title>
</head>
<body>
    <h1>Bienvenido <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>

    <h3>Listado de clientes</h3>
    <ul>
    <?php
    foreach ($clientes as $index => $cliente) {
        echo "<li>";
        echo "Cliente: " . htmlspecialchars($cliente['nombre']) . ", Usuario: " . htmlspecialchars($cliente['user']);
        echo " | <a href='formUpdateCliente.php?id=" . $cliente['id'] . "'>Editar</a>";
        echo " | <a href='../controllers/removeCliente.php?id=" . $cliente['id'] . "' onclick=\"return confirm('¿Estás seguro de eliminar este cliente?');\">Eliminar</a>";
        echo "</li>";
    }
    ?>
    </ul>

    <p><a href="formCreateCliente.php">Dar de alta un nuevo cliente</a></p>

    <h3>Listado de soportes</h3>
    <?php
    foreach ($soportes as $soporte) {
        echo "Soporte " . htmlspecialchars($soporte['id']) . ": " . htmlspecialchars($soporte['titulo']) . " - " . htmlspecialchars($soporte['tipo']);
        echo "<br>";
    }
    ?>

    <form action="../logout.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>
