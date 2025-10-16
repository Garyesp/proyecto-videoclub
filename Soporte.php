<?php
define('IVA', 1.21);
class Soporte
{
    public $titulo;
    private $numero = 0;
    private $precio;
    public function __construct($titulo, $numero, $precio)

    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }
    protected function asignarnumero()
    {
        return $this->numero++;
    }

    public function getNumero()
    {
        return $this->numero;
    }
    public function getPrecio()
    {
        return $this->precio;
    }

    public function muestraResumen()
    {
        echo "Titulo: $this->titulo";
        echo "Numero: $this->numero";
        echo "Precio: $this->precio";
    }
    public function getPrecioConIva()
    {
        return $this->precio * IVA;
    }
}
