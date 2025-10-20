<?php include "Soporte.php";
include "Juego.php";
?>
<?php
// test soporte
$soporte1 = new Soporte("Tenet",3.77);
$soporte1->muestraResumen();
echo "<br>";

?>

<?php
//test juego.php
//$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 2, 4); //no deberia tener el numero asignado porque es automatico
$mijuego = new Juego("The Last of Us Part II", 49.99, "PS4", 4, 4);
echo "<strong>{$mijuego->titulo}</strong><br>";
echo "Numero: {$mijuego->getNumero()}<br>";
echo "Precio: {$mijuego->getPrecio()} Euros <br>";
echo "Precio IVA incluido: {$mijuego->getPrecioConIva()}<br>";
$mijuego->muestraResumen();

?>