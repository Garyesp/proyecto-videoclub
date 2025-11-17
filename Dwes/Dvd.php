<?php
namespace Dwes\ProyectoVideoclub;

class Dvd extends Soporte
{
    public $idiomas;
    private $formatoPantalla;

    public function __construct($titulo, $precio, $idiomas, $formatoPantalla)
    {
        parent::__construct($titulo, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen()
    {
        echo "<br>Película en DVD:<br>";
        echo $this->titulo . "<br>";
        echo $this->getPrecio() . "€ (IVA no incluido)<br>";
        echo "Idiomas: " . $this->idiomas . "<br>";
        echo "Formato Pantalla: " . $this->formatoPantalla . "<br>";
    }
}
