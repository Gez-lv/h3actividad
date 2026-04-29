<h1>Usuarios Registrados</h1>

<?php if (isset($_SESSION['mensaje-exito'])): ?>
    <div class="mensaje-exito">
        <?php 
            echo $_SESSION['mensaje_exito'];
            unset($_SESSION['mensaje_exito']);
        ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['errores'])): ?>
    <div class="mensaje-error">
        <ul>
            <?php foreach ($_SESSION['errores'] as $error): ?>
                <li><?php echo $error;  ?></li>
            <?php endforeach; ?>
        </ul>        
    </div>
    <?php unset($_SESSION['errores']); ?>
<?php endif; ?>

<?php if (!empty($usuarios)): ?>
    <div class="tabla-container">
        <table class="tabla-usuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo $usuario['usuario']; ?></td>
                        <td><?php echo $usuario['email']; ?></td>
                        <td><?php echo $usuario['fecha_registro']; ?></td>
                        <td>
                            <div class="acciones-container">
                                <a href="<?php echo url('usuario/perfil/' . $usuario['id']); ?>" class="btn-accion">Ver</a>
                                <a href="<?php echo url('usuario/editar/' . $usuario['id']); ?>" class="btn-accion editar">Editar</a>
                                <a href="<?php echo url('usuario/eliminar/' . $usuario['id']); ?>" class="btn-accion eliminar" onclick="return confirm('¿Eliminar Usuario')">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="mensaje-error">No hay usuarios registrados</div>
<?php endif; ?>

<div class="volver-flex">
    <a href="<?php echo url('registro/index'); ?>" class="enlace">Nuevo Usuario</a>
</div>
