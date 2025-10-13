<?php
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

    public function getTitulo()
    {
        return $this->titulo;
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
}

?>


<!-- private $plataforma;
 public function __construct($c, $t, $v, $p)
 {
 $this->codigo = $c;
 $this->titulo = $t;
 $this->version = $v;
 $this->plataforma = $p;
 } -->