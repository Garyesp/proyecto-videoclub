<?php 

use Dwes\Videoclub;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    include_once "Dwes/Videoclub.php";

    $videoclub = new Videoclub("Blockbuster");

    $videoclub->incluirDvd("Alomola", 5, "Español", "16:9");
    $videoclub->incluirJuego("GTA5", 40, "PS5", 1, 4);
    $videoclub->incluirCintaVideo("Jurassic Park", 10, 120);

    $videoclub->incluirSocio("Juan", 3);

    $videoclub->alquilaSocioProducto(0, 0)
        ->alquilaSocioProducto(0, 1)
        ->alquilaSocioProducto(0, 2);
    ?>
</body>

</html>