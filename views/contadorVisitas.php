<div style="margin-top: 20px; padding: 15px; background: #e9ecef; border-radius: 5px;">
    <h3>Estadísticas de Visitas</h3>
    <p><?php echo $datosContador['mensaje']; ?></p>
    <?php if (!$datosContador['esPrimeraVez']): ?>
        <a href="?reiniciar=1" style="color: #007bff;">Reiniciar Contador</a>
    <?php endif; ?>
</div>