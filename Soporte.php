<?php
define('IVA', 1.21);
class Soporte
{
    public $titulo;
    protected $numero;
    private $precio;
    public function __construct($titulo, $numero, $precio)

    {
        $this->titulo = $titulo;
        $this->numero = $numero;
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
<<<<<<< HEAD
    public function getPrecioConIva() {
   
}

=======
    public function getPrecioConIva()
    {
        return $this->precio / IVA;
    }
>>>>>>> 2fde49a550ccac322ab780d2b50ae0f3a5f5a8b8
}
