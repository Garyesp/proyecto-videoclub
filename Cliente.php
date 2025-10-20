<?php
class Cliente
{
    public $nombre;
    private $numero;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados;
    private $maxAlquilerConcurrente;
    private static $numeroCliente = 0;

    public function __construct($nombre, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = self::$numeroCliente;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        self::$numeroCliente++;
    }



    public function getNumero()
    {
        return $this->numero;
    }

    public function getSoportesAlquilados()
    {
        return  count($this->soportesAlquilados);
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
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
        echo "Cantidad de alquileres: " . count($this->soportesAlquilados);
        echo "Numero: $this->numero<br>";
    }

    public function tieneAlquilado(Soporte $s): bool
    {
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte === ($s)) {
                return true;
            }
        }
        return false;
    }



    public function alquilar(Soporte $s): bool
    {
        if ($this->tieneAlquilado($s)) {
            echo "El cliente ya tiene alquilado el soporte " . $s->titulo . "<br>";
            return false;
        }


        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "Este cliente tiene " . count($this->soportesAlquilados) . " elementos alquilados. No puede alquilar más en este videoclub hasta que no devuelva algo<br>";
            return false;
        }

        $this->soportesAlquilados[] = $s;


        $this->numSoportesAlquilados++;
        echo "<br>Alquilado soporte a: $this->nombre<br>";
        $s->muestraResumen();
        echo "<br>";
        return true;
    }

    public function devolver(int $numSoporte): bool
    {
        foreach ($this->soportesAlquilados as $s => $soporte) {
            if ($soporte->getNumero() === $numSoporte) {

                // para borrar
                unset($this->soportesAlquilados[$s]);

                $this->numSoportesAlquilados--;

                echo "Se ha devuelto el soporte alquilado número $numSoporte correctamente.<br>";

                return true;
            }
        }

        if ($this->numSoportesAlquilados() == 0) {
            echo "<br>Este cliente no tiene alquilado ningún elemento <br>";
        }
        echo "No se ha podido encontrar el soporte en los alquileres de este cliente<br>";

        return false;
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
