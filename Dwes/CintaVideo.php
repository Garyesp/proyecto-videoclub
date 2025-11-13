<?php
namespace Dwes\ProyectoVideoclub;

class CintaVideo extends Soporte
{
    private $duracion;

    public function __construct($titulo, $precio, $duracion)
    {
        parent::__construct($titulo, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen()
    {
        echo "Película en VHS:<br>";
        echo $this->titulo . "<br>";
        echo $this->getPrecio() . " € (IVA no incluido)<br>";
        echo "Duración: $this->duracion minutos<br>";
    }
}
