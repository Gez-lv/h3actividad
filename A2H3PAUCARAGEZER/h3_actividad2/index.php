<?php
    session_start();

    //cargar los archivos base
    require_once 'config/database.php';
    require_once 'core/helpers.php';
    require_once 'core/Router.php';
    require_once 'core/Controller.php';
    //Iniciar o instanciar el enrutamiento
    $router = new Router();
    $router->dispatch();
?>