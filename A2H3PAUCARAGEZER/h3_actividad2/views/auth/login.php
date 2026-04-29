<?php
    $titulo_pagina = "Acceso";
    $contenedor_clase = "contenedor";
?>

<h2>Acceso a Lista de Usuarios</h2>

<?php if (isset($error)): ?>
    <div class="mensaje-error"><?php echo $error; ?></div>
<?php endif;?>

<form method="POST" action="<?php echo url('auth/login'); ?>" class="formulario">
    <div class="campo">
        <label>Contrasena de acceso:</label>
        <input type="password" name="password_acceso" required>
    </div>
    <button type="submit" class="boton">Acceder</button>
</form>

<div class="volver">
    <a href="<?php echo url('home/index'); ?>" class="enlace"><- Volver al inicio</a>
</div>
