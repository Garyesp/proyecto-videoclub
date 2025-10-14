<?php
require_once 'Soporte.php';

class CintaVideo extends Soporte {
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion) 
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    public function muestraResumen() {
        echo "Película en VHS:\n";
        echo "<br>$this->titulo\n";
        echo "<br>".$this->getPrecio()." € (IVA no incluido)\n";
        echo "<br>Duración: $this->duracion minutos\n";
    }
}
?>
