<?php
require_once 'Soporte.php';
class Juego extends Soporte
{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }
    public function muestraJugadoresPosibles() {}
    public function muestraResumen() {}
}

// echo "Película en VHS:\n";
// echo "<br>$this->titulo\n";
// echo "<br>".$this->getPrecio()." € (IVA no incluido)\n";
// echo "<br>Duración: $this->duracion minutos\n";

// include "Juego.php";

// $miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
// echo "<strong>" . $miJuego->titulo . "</strong>";
// echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
// echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
// $miJuego->muestraResumen();
