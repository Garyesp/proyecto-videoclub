<?php
class Dvd extends Soporte {
    public $duracion;
    private $formatoPantalla;

    public function __construct($titulo,$numero,$duracion,$formatoPantalla)
    {
        parent::__construct($titulo,$numero);
        $this->$duracion = $duracion;
        $this->$formatoPantalla = $formatoPantalla;
    }
}


?>