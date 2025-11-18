<?php
if (isset($_COOKIE['cookies_aceptadas'])) {
    return;
}
?>

<div style="position: fixed; bottom: 10px; right: 10px; background: white; border: 2px solid #ccc; padding: 15px; width: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.3);">
    <h4 style="margin: 0 0 10px 0;">Aceptar Cookies</h4>
    
    <form method="POST">
        <label style="display: block; margin: 5px 0;">
            <input type="checkbox" name="uso_comercial" value="1"> Uso comercial
        </label>
        
        <label style="display: block; margin: 5px 0;">
            <input type="checkbox" checked disabled> Necesarias
        </label>
        
        <div style="margin-top: 10px;">
            <button type="submit" name="accion" value="aceptar_todo" style="margin: 2px;">Aceptar Todo</button>
            <button type="submit" name="accion" value="aceptar" style="margin: 2px;">Aceptar</button>
            <button type="submit" name="accion" value="no_aceptar" style="margin: 2px;">No Aceptar</button>
        </div>
    </form>
</div>