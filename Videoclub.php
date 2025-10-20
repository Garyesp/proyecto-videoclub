<?php
require_once "Soporte.php";
require_once "CintaVideo.php";
require_once "Dvd.php";
require_once "Juego.php";
require_once "Cliente.php";
class Videoclub
{
    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto)
    {
        $this->productos[] = $producto;
        echo "Incluido soporte " . $this->numProductos . "<br>";
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $cinta = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
        $this->incluirProducto($cinta);
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $dvd = new Dvd($titulo, $this->numProductos, $precio, $idiomas, $pantalla);
        $this->incluirProducto($dvd);
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $juego = new Juego($titulo, $this->numProductos, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $cliente = new Cliente($nombre, $this->numSocios, $maxAlquileresConcurrentes);
        $this->socios[] = $cliente;
        echo "Incluido socio " . $this->numSocios . "<br>";
        $this->numSocios++;
    }

       public function listarProductos()
    {
        echo "<br>Listado de " . $this->numProductos . " productos disponibles:<br>";
        // para contar un numero que va aumentando en cada juego
        $i = 1;
        foreach ($this->productos as $p) {
            echo $i . ".- ";
            $p->muestraResumen();
            echo "<br>";
            $i++;
        }
    }

    public function listarSocios()
    {
        echo "<br>Listado de " . $this->numSocios . " socios del videoclub:<br>";
        $i = 1;
        foreach ($this->socios as $s) {
            echo $i . ".- Cliente " . $s->getNumero() . ": " . $s->nombre . "<br>";
            echo "Alquileres actuales: " .$s->getSoportesAlquilados() . "<br>";
            $i++;
        }
    }

    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {
        $socio = null;
        $producto = null;

         foreach ($this->socios as $c) {
            if ($c->getNumero() == $numeroCliente) {
                $socio = $c;
                break;
            }
        }

        foreach ($this->productos as $p) {
            if ($p->getNumero() == $numeroSoporte) {
                $producto = $p;
                break;
            }
        }

        if ($socio && $producto) {
            $socio->alquilar($producto);
        }
    }
}
?>
