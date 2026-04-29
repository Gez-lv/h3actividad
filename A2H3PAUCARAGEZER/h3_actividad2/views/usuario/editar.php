<h1>Editar Usuarios</h1>

<?php if (isset($_SESSION['errores'])): ?>
    <div class="mensaje-error">
        <ul>
            <?php foreach ($_SESSION['errores'] as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errores']); ?>
<?php  endif; ?>

<form method="POST" action="<?php echo url('usuario/actualizar'); ?>" class="formulario">
    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">

    <div class="campo">
        <label>Usuario: </label>
        <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario['usuario']); ?>" required>
    </div>
    <div class="campo">
        <label>Email: </label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>
    </div>
    <div class="campo">
        <label>Nueva Contraseña (opcional):</label>
        <input type="password" name="password" placeholder="Dejar vacio para no cambiar">
    </div>

    <div class="volver-flex">
        <button type="submit" class="boton">Actualizar</button>
        <a href="<?php echo url('usuario/lista'); ?>" class="enlace">Cancelar</a>
    </div>
</form>
