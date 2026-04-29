<?php
    $titulo_pagina = "inicio";
    $contenedor_clase = "contenedor";
?>

<section class="hero">
    <h1>Arquitectura MVC</h1>
    <p>Proyecto de demostración</p>
</section>

<section>
    <h2>Estadísticas</h2>
    <div class="tarjetas-grid">
        <article class="tarjeta">
            <div class="tarjeta-contenido text-center">
                <h3>Usuarios</h3>
                <p class="stats-numero"><?php echo $totalUsuarios; ?></p>
            </div>
        </article>
    </div>
</section>