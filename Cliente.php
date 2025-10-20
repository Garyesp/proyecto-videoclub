<?php
class Cliente
{
    public $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;
    private static $contadorClientes = 1;

    public function __construct($nombre, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = self::$contadorClientes;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        self::$contadorClientes++;
    }

    public function alquilar($soporte)
    {
        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            echo "has alcanzado el maximo de alquileres: {$this->maxAlquilerConcurrente}<br>";
            return false;
        }
    }




    // funciones reutilizables
    public function tieneAlquilado($soporte)
    {
        foreach ($this->soportesAlquilados as $soporteAlquilado) {
            if ($soporteAlquilado->getNumero() === $soporte->getNumero()) {
                return true;
            }
        }
        return false;
    }
}
