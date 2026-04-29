<?php
    require_once 'core/Controller.php';
    require_once 'models/UsuarioModel.php';

    function HomeController_index() {
        $usuarios = UsuarioModel_obtenerTodos();
        view('home.index', ['totalUsuarios' => count($usuarios)]);
    }
?>