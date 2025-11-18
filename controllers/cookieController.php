<?php
class CookieController {
    
    public function comprobarAceptado() {
        return isset($_COOKIE['cookies_aceptadas']);
    }
    
    public function procesarFormulario() {
        if ($_POST['accion'] == 'aceptar_todo') {
            setcookie('cookies_aceptadas', '1', time() + 365 * 24 * 60 * 60);
            setcookie('uso_comercial', '1', time() + 365 * 24 * 60 * 60);
            setcookie('necesarias', '1', time() + 365 * 24 * 60 * 60);
        }
        elseif ($_POST['accion'] == 'aceptar') {
            $comercial = isset($_POST['uso_comercial']) ? '1' : '0';
            setcookie('cookies_aceptadas', '1', time() + 365 * 24 * 60 * 60);
            setcookie('uso_comercial', $comercial, time() + 365 * 24 * 60 * 60);
            setcookie('necesarias', '1', time() + 365 * 24 * 60 * 60);
        }
        elseif ($_POST['accion'] == 'no_aceptar') {
            setcookie('cookies_aceptadas', '', time() - 3600);
            setcookie('uso_comercial', '', time() - 3600);
            setcookie('necesarias', '', time() - 3600);
        }
        return true;
    }
}
?>