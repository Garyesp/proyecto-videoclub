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

        if ($this->minNumJugadores == "1"  && $this->maxNumJugadores == "1") {
            echo "Para $this->minNumJugadores jugador";
        } else if ($this->minNumJugadores == $this->maxNumJugadores) {
            echo "Para $this->minNumJugadores jugadores";
        } else if ($this->minNumJugadores == "1" && $this->maxNumJugadores != "1") {
            echo "De $this->minNumJugadores para $this->maxNumJugadores jugadores";
        }
        if ($this->maxNumJugadores < $this->minNumJugadores) {
            echo "Error al crear Juego: min:$this->minNumJugadores / max: $this->maxNumJugadores <br>";
            echo $this->asignarnumero();
        };
    }
    public function muestraResumen()
    {
          echo "Juego para: $this->consola<br>";
       echo $this->titulo . "<br>";
        echo $this->getPrecio() . " € (IVA no incluido)<br>";
        $this->muestraJugadoresPosibles();
    }
}