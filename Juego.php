<?php
require_once 'Soporte.php';
class Juego extends Soporte
{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    public function __construct($titulo, $precio, $consola, $minNumJugadores, $maxNumJugadores)
    {
        parent::__construct($titulo, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }
    public function muestraJugadoresPosibles()
    {
        if ($this->minNumJugadores == $this->maxNumJugadores) {
            return "Para {$this->minNumJugadores} jugador(es)";
        } else {
            return "De {$this->minNumJugadores} a {$this->maxNumJugadores} jugadores";
        }
    }
    public function muestraResumen()
    {
        echo "Juego para: {$this->consola}<br>";
        echo "Jugadores: {$this->muestraJugadoresPosibles()}<br>";
    }
}
