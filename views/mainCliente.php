<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

$soportes = $_SESSION['soportes'] ?? [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>

    <h3>Listado de soportes</h3>
    <?php
    if (isset($SESSION['soportes'])) {
        foreach ($soportes as $soporte) {
            echo "Soporte " . $soporte['id'] . ": " . $soporte['titulo'] . $soporte['tipo'];
            echo " ";
        }
    } else {
        echo "No hay soportes";
    }
    ?>

      <form action="../logout.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>

</html>