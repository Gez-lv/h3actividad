<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tituloPagina ?? 'MVC Demo'; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('css/estilos.css'); ?>">
</head>
<body>
    <header class="site-header">
        <nav class="nav-menu">
            <ul>
                <li><a href="<?php echo url('home/index'); ?>">Inicio</a></li>
                <li><a href="<?php echo url('registro/index'); ?>">Registro</a></li>
                <li><a href="<?php echo url('usuario/lista'); ?>">Usuarios</a></li>
                <?php if (estaAutenticado()): ?>
                    <li><a href="<?php echo url('auth/logout'); ?>" class="cerrar-sesion">Cerrar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main class="<?php echo $contenedor_clase ?? 'contenedor'; ?>">
