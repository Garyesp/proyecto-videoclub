<?php
session_start();

/* Verifico si la variable de sesión no existe && 
Si el usuario logueado no es el administrador*/
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

$clientes = $_SESSION['clientes'] ?? [];
$soportes = $_SESSION['soportes'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mainAdmin</title>
</head>

<body>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>

    <h3>Listado de clientes</h3>

    <?php


    foreach ($clientes as $cliente) {
        echo "<li>Cliente: " . $cliente['nombre'] . " , Usuario: " . $cliente['gmail'] . "</li>";
    }
    ?>

     <p><a href="formCreateCliente.php">Dar de alta un nuevo cliente</a></p>

    <h3>Listado de soportes</h3>
    <?php
    foreach ($soportes as $soporte) {
        echo "Soporte " . $soporte['id'] . ": " . $soporte['titulo'] . $soporte['tipo'];
        echo " ";
    }
    ?>

    <form action="../logout.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>

</html>