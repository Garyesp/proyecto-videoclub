<?php
//require_once 'Resumible.php';
define('IVA', 1.21);
class Soporte
{
    public $titulo;
    private $numero = 0;
    private $precio;
    private static $contadorsoporte = 0;

    public function __construct($titulo, $precio)

    {
        $this->titulo = $titulo;
        //$this->numero = $numero;
        $this->numero = self::$contadorsoporte;
        $this->precio = $precio;
        self::$contadorsoporte++;
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
