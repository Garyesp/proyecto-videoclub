<?php
class CintaVideo extends Soporte {
    private $duracion;

    public function __construct($titulo,$numero,$duracion) 
    {
        parent::__construct($titulo,$numero);
        $this->duracion = $duracion;
    }
    
    public function muestraResumen() {

    }
}

?>