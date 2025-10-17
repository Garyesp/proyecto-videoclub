<?php
require_once 'Soporte.php';

class CintaVideo extends Soporte {
    private $duracion;

    public function __construct($titulo, $precio, $duracion) 
    {
        parent::__construct($titulo, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen() {
        echo "Película en VHS:";
        echo "<br>$this->titulo";
        echo "<br>".$this->getPrecio()." € (IVA no incluido)";
        echo "<br>Duración: $this->duracion minutos";
    }
}
?>
