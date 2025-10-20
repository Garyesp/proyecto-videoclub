<?php
require_once 'Resumible.php';
define('IVA', 1.21);
 abstract class Soporte implements Resumible
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
        echo "<br>Titulo: $this->titulo<br>";
        echo "Numero: $this->numero<br>";
        echo "Precio: $this->precio<br>";
    }
    public function getPrecioConIva()
    {
        return $this->precio * IVA;
    }
}
?>