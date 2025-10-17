<?php

class Videoclub
{
    private $nombre;
    private $productos = [];
    private $numProductos;
    private $socios = [];
    private $numSocios;
    
    public function __construct($nombre, $productos = [], $socios = [])
    {
        $this->nombre = $nombre;
        $this->productos = $productos;
        $this->numProductos = count($productos);
        $this->socios = $socios;
        $this->numSocios = count($socios);
    }

    private function incluirProducto(Soporte $producto)
    {
        $this->productos[] = $producto;
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $this->incluirProducto(new CintaVideo($titulo, $precio, $duracion));
        $this->numProductos++;
    }


    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $this->incluirProducto(new Dvd($titulo, $precio, $idiomas, $pantalla));
        $this->numProductos++;
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $this->incluirProducto(new Juego($titulo, $precio, $consola, $minJ, $maxJ));
        $this->numProductos++;
    }

    public function incluirSocio($titulo, $maxAlquileresConcurrentes = 3) {}


    public function listarProductos()
    {// holaaa
        foreach ($this->productos as $p) {
            echo $p;
        }
    }

    public function listarSocios() {}

    public function alquilarSocioProducto($numeroCliente, $numeroSoporte) {}
}
