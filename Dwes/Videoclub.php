<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\Util\SoporteYaAlquiladoException;
use Dwes\Util\CupoSuperadoException;
use Dwes\Util\SoporteNoEncontradoException;

class Videoclub
{
    private $nombre;
    private $productos = [];
    private $socios = [];
    private $numProductosAlquilados = 0;
    private $numTotalAlquileres = 0;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    public function incluirProducto(Soporte $producto)
    {
        $this->productos[] = $producto;
        return $this;
    }

    public function incluirCintaVideo(string $titulo, float $precio, int $duracion)
    {
        $cinta = new CintaVideo($titulo, $precio, $duracion);
        return $this->incluirProducto($cinta);
    }

    public function incluirDvd(string $titulo, float $precio, array $idiomas, string $pantalla)
    {
        $dvd = new Dvd($titulo, $precio, $idiomas, $pantalla);
        return $this->incluirProducto($dvd);
    }

    public function incluirJuego(string $titulo, float $precio, string $consola, int $minJ, int $maxJ)
    {
        $juego = new Juego($titulo, $precio, $consola, $minJ, $maxJ);
        return $this->incluirProducto($juego);
    }

    public function incluirSocio(string $nombre, string $usuario, string $password, int $maxAlquileresConcurrentes = 3)
    {
        $cliente = new Cliente($nombre, $usuario, $password, $maxAlquileresConcurrentes);
        $this->socios[] = $cliente;
        return $this;
    }

    public function listarProductos(): void
    {
        echo "<br>Productos disponibles:<br>";
        foreach ($this->productos as $p) {
            $p->muestraResumen();
        }
    }

    public function listarSocios(): void
    {
        echo "<br>Socios del videoclub:<br>";
        foreach ($this->socios as $s) {
            echo "Cliente {$s->getNumero()} - {$s->nombre} ({$s->getUsuario()})<br>";
            echo "Alquileres actuales: {$s->getSoportesAlquilados()}<br>";
        }
    }

    // Métodos para alquilar y devolver (igual que antes, con captura de excepciones)
    public function alquilaSocioProducto(int $numSocio, int $numProducto)
    {
        $socio = null;
        $producto = null;

        foreach ($this->socios as $c) {
            if ($c->getNumero() === $numSocio) {
                $socio = $c;
                break;
            }
        }

        foreach ($this->productos as $p) {
            if ($p->getNumero() === $numProducto) {
                $producto = $p;
                break;
            }
        }

        if (!$socio || !$producto) {
            echo "Socio o producto no encontrado<br>";
            return $this;
        }

        try {
            $socio->alquilar($producto);
            $this->numProductosAlquilados++;
            $this->numTotalAlquileres++;
        } catch (\Exception $e) {
            echo $e->getMessage() . "<br>";
        }

        return $this;
    }
}
