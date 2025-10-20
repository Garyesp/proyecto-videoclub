<?php
define('IVA', 1.21);
class Soporte
{
    public $titulo;
    private $numero = 0;
    private $precio;
    private static $contador = 1;

    public function __construct($titulo, $precio)

    {
        $this->titulo = $titulo;
        $this->precio = $precio;
        $this->numero = self::$contador;
        self::$contador++;
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
        echo "Titulo: {$this->titulo}<br>";
        echo "Numero: {$this->numero}<br>";
        echo "Precio: {$this->precio}<br>";
        echo "Precio con Iva: {$this->getPrecioConIva()}<br>";
    }
    public function getPrecioConIva()
    {
        return number_format($this->precio * IVA, 2);
    }
}
