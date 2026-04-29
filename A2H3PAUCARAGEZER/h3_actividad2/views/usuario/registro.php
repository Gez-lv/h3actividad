<?php if (isset($_SESSION['errores'])): ?>
    <div class="mensaje-error">
        <ul>
            <?php foreach ($_SESSION['errores'] as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errores']); ?>
<?php endif; ?>

<form method="POST" action="<?php echo url('registro/guardar'); ?>" class="formulario">
    <div class="campo">
        <label>Usuario:</label>
        <input type="text" name="usuario" value="<?php echo $_SESSION['datos_formulario']['usuario'] ?? ''; ?>">
    </div>
    <div class="campo">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $_SESSION['datos_formulario']['email'] ?? ''; ?>">
    </div>
    <div class="campo">
        <label>Contraseña:</label>
        <input type="password" name="password">
    </div>
    <button type="submit" class="boton">Registrarse</button>
</form>

<?php unset($_SESSION['datos_formulario']); ?>
