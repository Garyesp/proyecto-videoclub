<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\Util\SoporteYaAlquiladoException;
use Dwes\Util\CupoSuperadoException;
use Dwes\Util\SoporteNoEncontradoException;


class Videoclub
{
    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

    // nuevos contadores
    private $numProductosAlquilados = 0;
    private $numTotalAlquileres = 0;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    private function incluirProducto(Soporte $producto)
    {
        $this->productos[] = $producto;
        echo "<br>Incluido soporte " . $this->numProductos . "<br>";
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $cinta = new CintaVideo($titulo, $precio, $duracion);
        $this->incluirProducto($cinta);
        return $this;
    }

    public function incluirDvd($titulo, $precio, $idiomas, $pantalla)
    {
        $dvd = new Dvd($titulo, $precio, $idiomas, $pantalla);
        $this->incluirProducto($dvd);
        return $this;
    }

    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ)
    {
        $juego = new Juego($titulo, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
        return $this;
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $cliente = new Cliente($nombre, $maxAlquileresConcurrentes);
        $this->socios[] = $cliente;
        echo "<br>Incluido socio " . $this->numSocios . "<br>";
        $this->numSocios++;
        return $this;
    }

    public function listarProductos()
    {
        echo "<br>Listado de " . $this->numProductos . " productos disponibles:<br>";
        $i = 1;
        foreach ($this->productos as $p) {
            echo $i . "-";
            $p->muestraResumen();
            echo "<br>";
            $i++;
        }
    }

    public function listarSocios()
    {
        echo "<br>Listado de " . $this->numSocios . " socios del videoclub:<br>";
        $i = 1;
        foreach ($this->socios as $s) {
            echo $i . "- Cliente " . $s->getNumero() . ": " . $s->nombre . "<br>";
            echo "Alquileres actuales: " . $s->getSoportesAlquilados() . "<br>";
            $i++;
        }
    }

    // getters nuevos
    public function getNumProductosAlquilados()
    {
        return $this->numProductosAlquilados;
    }

    public function getNumTotalAlquileres()
    {
        return $this->numTotalAlquileres;
    }

    // método para alquilar un producto por socio (captura excepciones lanzadas por Cliente)
    public function alquilaSocioProducto($numeroCliente, $numeroSoporte)
    {
        $socio = null;
        $producto = null;

        foreach ($this->socios as $c) {
            if ($c->getNumero() == $numeroCliente) {
                $socio = $c;
                break;
            }
        }

        foreach ($this->productos as $p) {
            if ($p->getNumero() == $numeroSoporte) {
                $producto = $p;
                break;
            }
        }

        if (! $socio) {
            echo "No hay socio con número $numeroCliente<br>";
            return $this;
        }
        if (! $producto) {
            echo "No hay producto con número $numeroSoporte<br>";
            return $this;
        }

        try {
            $socio->alquilar($producto);
            $this->numProductosAlquilados++;
            $this->numTotalAlquileres++;
            echo "<br>Alquiler efectuado: socio {$numeroCliente} -> producto {$numeroSoporte}<br>";
        } catch (SoporteYaAlquiladoException $e) {
            echo "Error al alquilar: " . $e->getMessage() . "<br>";
        } catch (CupoSuperadoException $e) {
            echo "Error al alquilar: " . $e->getMessage() . "<br>";
        } catch (\Exception $e) {
            echo "Error inesperado al alquilar: " . $e->getMessage() . "<br>";
        }

        return $this;
    }

    // alquila varios productos: primero comprueba disponibilidad de todos
    public function alquilarSocioProductos(int $numSocio, array $numerosProductos)
    {
        // buscar socio
        $socio = null;
        foreach ($this->socios as $c) {
            if ($c->getNumero() == $numSocio) {
                $socio = $c;
                break;
            }
        }
        if (! $socio) {
            echo "No hay socio con número $numSocio<br>";
            return $this;
        }

        // recopilar productos y comprobar disponibilidad
        $productosAAlquilar = [];
        foreach ($numerosProductos as $numProd) {
            $found = null;
            foreach ($this->productos as $p) {
                if ($p->getNumero() == $numProd) {
                    $found = $p;
                    break;
                }
            }
            if (! $found) {
                echo "Producto $numProd no encontrado. No se alquila nada.<br>";
                return $this;
            }
            if ($found->alquilado) {
                echo "Producto $numProd ya está alquilado. No se alquila nada.<br>";
                return $this;
            }
            $productosAAlquilar[] = $found;
        }

        // si todos disponibles, alquilarlos (capturando excepciones por si el cliente tiene cupo)
        try {
            foreach ($productosAAlquilar as $p) {
                $socio->alquilar($p);
                $p->alquilado = true;
                $this->numProductosAlquilados++;
                $this->numTotalAlquileres++;
            }
            echo "Alquiler múltiple realizado para socio $numSocio: [" . implode(',', $numerosProductos) . "]<br>";
        } catch (CupoSuperadoException $e) {
            echo "No se pudo completar alquiler múltiple: " . $e->getMessage() . "<br>";
            // Si se hubiera producido algún alquiler parcial (raro porque se lanza en el primer falla),
            // decidimos no revertir aquí para simplificar; en entorno real habría transacción.
        } catch (\Exception $e) {
            echo "Error en alquiler múltiple: " . $e->getMessage() . "<br>";
        }

        return $this;
    }

    // devolver un producto de un socio
    public function devolverSocioProducto(int $numSocio, int $numeroProducto)
    {
        // buscar socio
        $socio = null;
        foreach ($this->socios as $c) {
            if ($c->getNumero() == $numSocio) {
                $socio = $c;
                break;
            }
        }
        if (! $socio) {
            echo "No hay socio con número $numSocio<br>";
            return $this;
        }

        try {
            $socio->devolver($numeroProducto);
            // actualizar contador global de productos alquilados
            if ($this->numProductosAlquilados > 0) {
                $this->numProductosAlquilados--;
            }
            echo "Devolución efectuada: socio $numSocio -> producto $numeroProducto<br>";
        } catch (SoporteNoEncontradoException $e) {
            echo "No se pudo devolver: " . $e->getMessage() . "<br>";
        } catch (\Exception $e) {
            echo "Error en devolución: " . $e->getMessage() . "<br>";
        }

        return $this;
    }

    // devolver varios productos
    public function devolverSocioProductos(int $numSocio, array $numerosProductos)
    {
        foreach ($numerosProductos as $numProd) {
            $this->devolverSocioProducto($numSocio, $numProd);
        }
        return $this;
    }
}
