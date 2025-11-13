<?php
namespace Dwes\ProyectoVideoclub;
use Dwes\Util\SoporteYaAlquiladoException;
use Dwes\Util\CupoSuperadoException;
use Dwes\Util\SoporteNoEncontradoException;


class Cliente
{
    public $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;
    private static $numeroCliente = 0;

    public function __construct($nombre, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = self::$numeroCliente++;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getSoportesAlquilados()
    {
        return count($this->soportesAlquilados);
    }

    private function numSoportesAlquilados()
    {
        return $this->numSoportesAlquilados;
    }

    public function alquilarSoporte(Soporte $soporte)
    {
        $this->soportesAlquilados[] = $soporte;
        $this->numSoportesAlquilados++;
    }

    public function muestraResumen()
    {
        echo "<br>Nombre: $this->nombre<br>";
        echo "Cantidad de alquileres: " . count($this->soportesAlquilados) . "<br>";
        echo "Numero: $this->numero<br>";
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte === $s) {
                return true;
            }
        }
        return false;
    }

    // Ahora lanza excepciones y devuelve $this para encadenar
    public function alquilar(Soporte $s)
    {
        if ($this->tieneAlquilado($s)) {
            throw new SoporteYaAlquiladoException("El cliente ya tiene alquilado el soporte {$s->titulo}");
        }

        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException("Cupo de alquileres superado para el cliente {$this->nombre}");
        }

        $this->soportesAlquilados[] = $s;
        $s->alquilado = true;
        $this->numSoportesAlquilados++;
        return $this;
    }

    // ahora devuelve $this para encadenado y lanza excepción si no existe
    public function devolver(int $numSoporte)
    {
        foreach ($this->soportesAlquilados as $index => $soporte) {
            if ($soporte->getNumero() === $numSoporte) {
                // marca como devuelto
                $soporte->alquilado = false;

                // para borrar
                unset($this->soportesAlquilados[$index]);
                $this->numSoportesAlquilados--;

                return $this;
            }
        }

        // no encontrado
        throw new SoporteNoEncontradoException("El soporte $numSoporte no está alquilado por el cliente {$this->nombre}");
    }

    public function listarAlquileres(): void
    {
        $num = count($this->soportesAlquilados);
        if ($num === 0) {
            echo "Este cliente no tiene alquilado ningún elemento<br>";
            return;
        }

        echo "El cliente tiene $num soportes alquilados:<br>";
        foreach ($this->soportesAlquilados as $s) {
            $s->muestraResumen();
            echo "<br>";
        }
    }
}
