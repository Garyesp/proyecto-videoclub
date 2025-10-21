
<?php


include "CintaVideo.php";


//$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
$miCinta = new CintaVideo("Los cazafantasmas", 3.5, 107);
echo "<strong>" . $miCinta->titulo . "</strong>";
echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
$miCinta->muestraResumen();
echo "<br><br><br><br><br>";
?>


<?php
include "Dvd.php";

$miDvd = new Dvd("Origen", 15, "es,en,fr", "16:9");
echo "<strong>" . $miDvd->titulo . "</strong>";
echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
$miDvd->muestraResumen();
echo "<br><br><br><br><br>";
?>


<?php
include "Juego.php";

$miJuego = new Juego("The Last of Us Part IIII", 49.99, "PS4", 1, 1);
echo "<strong>" . $miJuego->titulo . "</strong>";
echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros<br>";
$miJuego->muestraResumen();
echo "<br><br><br><br><br>";

?>