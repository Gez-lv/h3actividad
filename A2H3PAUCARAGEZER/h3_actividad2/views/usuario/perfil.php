<h1>Perfil de Usuario</h1>

<div class="perfil-header">
    <div class="perfil-avatar">
        <span class="avatar-inicial"><?php echo strtoupper(substr($usuario['usuario'], 0, 1)); ?></span>
    </div>
    <div class="perfil-info">
        <h2><?php echo $usuario['usuario']; ?></h2>
        <p><strong>Email: </strong><?php echo $usuario['email']; ?></p>
        <p><strong>Miembro desde: </strong><?php echo date('d/m/Y', strtotime($usuario['fecha_registro'])); ?></p>
    </div>
</div>

<div class="volver">
    <a href="<?php echo url('usuario/lista'); ?>" class="enlace"><- Volver</a>
</div>
