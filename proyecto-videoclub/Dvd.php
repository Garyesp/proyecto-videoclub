<?php
require_once 'Soporte.php';

class Dvd extends Soporte {
    public $idiomas;
    private $formatoPantalla;

    public function __construct($titulo,$precio,$idiomas,$formatoPantalla)
    {
        parent::__construct($titulo,$precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    } 

     public function muestraResumen() {
        echo "Origen\n";
        echo "<br>".$this->getPrecio()."€ (IVA no incluido)\n";
        echo "<br>Idiomas:".$this->idiomas;
        echo "<br>Formato Pantalla:".$this->formatoPantalla;
    }
}




?>