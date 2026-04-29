<?php
require_once 'core/Controller.php';
require_once 'core/helpers.php';

function AuthController_login() {
    $password_acceso = 'admin123';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $password_ingresado = trim(post('password_acceso'));


        if ($password_ingresado === $password_acceso) {


            $_SESSION['autenticado'] = true;

           
            redirect('usuario/lista');

        } else {
         
            view('auth.login', [
                'error' => 'Contraseña incorrecta'
            ]);
        }

    } else {
        view('auth.login');
    }
}

function AuthController_logout() {
    session_destroy();
    redirect('home/index');
}
?>