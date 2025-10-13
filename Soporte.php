<?php
define('IVA', 0.21);
class Soporte
{
    public $titulo;
    protected $numero;
    private $precio;
    public function __construct($titulo, $numero, $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $$numero;
        $this->precio = $precio;
    }


    public function getNumero()
    {
        return $this->numero;
    }
    public function getPrecio()
    {
        return $this->precio;
    }

    public function muestraResumen() {}
    public function getPrecioConIva() {}
}
