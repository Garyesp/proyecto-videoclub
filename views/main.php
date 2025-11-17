<?php 
    session_start();

    /* isset comprueba si un valor existe o es null */
    if (!isset($_SESSION['usuario'])) {
    /* Si no existe el usuario, va a index.php */
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main.php</title>
</head>
<body>
    <h1>Bienvenido 
        <?php echo $_SESSION['usuario']; ?>
    </h1>

    <p><a href="logout.php">Cerrar sesion</a></p>
</body>
</html>