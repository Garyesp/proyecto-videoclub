<?php
namespace Dwes\ProyectoVideoclub;

use Dwes\Util\SoporteYaAlquiladoException;
use Dwes\Util\CupoSuperadoException;
use Dwes\Util\SoporteNoEncontradoException;
use Dwes\ProyectoVideoclub\Juego;
use Dwes\ProyectoVideoclub\CintaVideo;
use Dwes\ProyectoVideoclub\Dvd;

class Cliente
{
    public $nombre;
    private $usuario;
    private $password;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;
    private static $numeroCliente = 0;

   public function __construct(string $nombre, string $usuario, string $password, int $maxAlquilerConcurrente = 3)
{
    $this->nombre = $nombre;
    $this->usuario = $usuario;
    $this->password = $password;
    $this->numero = self::$numeroCliente++;
    $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
}

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getSoportesAlquilados(): int
    {
        return count($this->soportesAlquilados);
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        return in_array($s, $this->soportesAlquilados, true);
    }

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

    public function devolver(int $numSoporte)
    {
        foreach ($this->soportesAlquilados as $index => $soporte) {
            if ($soporte->getNumero() === $numSoporte) {
                $soporte->alquilado = false;
                unset($this->soportesAlquilados[$index]);
                $this->numSoportesAlquilados--;
                return $this;
            }
        }
        throw new SoporteNoEncontradoException("El soporte $numSoporte no está alquilado por el cliente {$this->nombre}");
    }

    public function listarAlquileres(): void
    {
        if (empty($this->soportesAlquilados)) {
            echo "Este cliente no tiene alquilado ningún elemento<br>";
            return;
        }
        echo "El cliente tiene " . count($this->soportesAlquilados) . " soportes alquilados:<br>";
        foreach ($this->soportesAlquilados as $s) {
            $s->muestraResumen();
            echo "<br>";
        }
    }
}
