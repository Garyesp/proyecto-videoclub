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
    public function muestraJugadoresPosibles()
    {
        return $this->maxNumJugadores;
    }
    public function muestraResumen()
    {
        echo "Juego para: $this->consola<br>";
        echo "$this->titulo<br>";
        echo $this->getPrecio() . " (IVA no incluido)<br>";
        // echo "Para " . $this->maxNumJugadores . " Jugador";
        if ($this->minNumJugadores == $this->maxNumJugadores) {
            echo "Para $this->minNumJugadores Jugadores";
        }
        if ($this->maxNumJugadores < $this->minNumJugadores) {
            echo "Error al crear Juego: min:$this->minNumJugadores / max: $this->maxNumJugadores <br>";
            echo $this->asignarnumero();
        };
    }
}



// The Last of Us Part II
// Precio: 49.99 euros
// Precio IVA incluido: 57.9884 euros

// Juego para: PS4
// The Last of Us Part II
// 49.99 € (IVA no incluido)
// Para un jugador