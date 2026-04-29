<?php
require_once 'core/Controller.php';
require_once 'core/helpers.php';
require_once 'models/UsuarioModel.php';
require_once 'funciones/validacion.php';

function RegistroController_index() {  
    view('usuario.registro');
}

function RegistroController_guardar() { 
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        redirect('registro/index');
    }

    $errores = [];

    $usuario = limpiarDato(post('usuario'));
    $email = limpiarDato(post('email'));
    $password = limpiarDato(post('password'));

    // VALIDAR
    $valUsuario = validarUsuario($usuario);
    if ($valUsuario !== true) $errores[] = $valUsuario;

    $valEmail = validarEmail($email);
    if ($valEmail !== true) $errores[] = $valEmail;

    $valPassword = validarPassword($password);
    if ($valPassword !== true) $errores[] = $valPassword;

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        $_SESSION['datos_formulario'] = [
            'usuario' => $usuario,
            'email' => $email
        ];
        redirect('registro/index');
        return;
    }

    if (UsuarioModel_existe($usuario, $email)) {
        $_SESSION['errores'] = ["El usuario o email ya existe"];
        $_SESSION['datos_formulario'] = [
            'usuario' => $usuario,
            'email' => $email
        ];
        redirect('registro/index');
        return;
    }

    $id = UsuarioModel_crear($usuario, $email, $password);

    if ($id) {
        $_SESSION['mensaje_exito'] = "Usuario registrado correctamente";
        redirect('usuario/lista');
    } else {
        $_SESSION['errores'] = ["Error al registrar usuario"]; 
        redirect('registro/index');
    }
}
?>