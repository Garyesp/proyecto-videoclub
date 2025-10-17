<?php
define('IVA', 0.21);
class Soporte
{
    public $titulo;
    protected $numero;
    private $precio;
    public function __construct($titulo, $precio)

    {
        $this->titulo = $titulo;
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
 

    public function getPrecioConIva()
    {
        return $this->precio * IVA + $this->precio;
    }

}
