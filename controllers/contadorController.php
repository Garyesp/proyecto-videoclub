<?php
class ContadorController {
    
    public function obtenerContador() {
        if (isset($_COOKIE['contador_visitas'])) {
            $contador = $_COOKIE['contador_visitas'] + 1;
            $esPrimeraVez = false;
        } else {
            $contador = 1;
            $esPrimeraVez = true;
        }
        
        // Guardar/actualizar cookie
        setcookie('contador_visitas', $contador, time() + (30 * 24 * 60 * 60));
        
        return [
            'contador' => $contador,
            'esPrimeraVez' => $esPrimeraVez,
            'mensaje' => $esPrimeraVez ? 
                "¡Bienvenido! Esta es tu primera visita" : 
                "Has visitado esta página $contador veces"
        ];
    }
    
    public function reiniciarContador() {
        // Establecer directamente a 1 sin incrementar
        setcookie('contador_visitas', 1, time() + (30 * 24 * 60 * 60));
        
        return [
            'contador' => 1,
            'esPrimeraVez' => false,
            'mensaje' => "Has visitado esta página 1 vez (contador reiniciado)"
        ];
    }
}
?>