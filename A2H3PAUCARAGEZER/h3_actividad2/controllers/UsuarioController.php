<?php
require_once 'core/Controller.php';
require_once 'core/helpers.php';
require_once 'models/UsuarioModel.php';
require_once 'funciones/validacion.php';

function UsuarioController_lista() {
    if (!estaAutenticado()) {
        redirect('auth/login');
    }

    $usuarios = UsuarioModel_obtenerTodos();
    view('usuario.lista', ['usuarios' => $usuarios]);
}

function UsuarioController_perfil($id) {
    if (!estaAutenticado()) {
        redirect('auth/login');
    }

    $usuario = UsuarioModel_obtenerPorId($id);

    if (!$usuario) {
        redirect('usuario/lista');
    }

    view('usuario.perfil', ['usuario' => $usuario]);
}


function UsuarioController_editar($id) {
    if (!estaAutenticado()) {
        redirect('auth/login');
    }

    $usuario = UsuarioModel_obtenerPorId($id);

    if (!$usuario) {
        redirect('usuario/lista');
    }

    view('usuario.editar', ['usuario' => $usuario]);
}

function UsuarioController_actualizar() {
    if (!estaAutenticado()) {
        redirect('auth/login');
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        redirect('usuario/lista');
    }

    $errores = [];

    $id = post('id');
    $usuario = limpiarDato(post('usuario'));
    $email = limpiarDato(post('email'));
    $password = limpiarDato(post('password'));

    $valUsuario = validarUsuario($usuario);
    if ($valUsuario !== true) $errores[] = $valUsuario;

    $valEmail = validarEmail($email);
    if ($valEmail !== true) $errores[] = $valEmail;

    if (!empty($password)) {
        $valPassword = validarPassword($password);
        if ($valPassword !== true) {
            $errores[] = $valPassword;
        }
    }

    if (!empty($errores)) {
        $_SESSION['errores'] = $errores;
        redirect('usuario/editar/'.$id);
        return;
    }

    $actualizado = UsuarioModel_actualizar($id, $usuario, $email);

    if ($actualizado) {
        $_SESSION['mensaje_exito'] = "Usuario actualizado correctamente";
    } else {
        $_SESSION['errores'] = ["No se realizaron cambios"];
    }

    redirect('usuario/lista');
}

function UsuarioController_eliminar($id) {
    if (!estaAutenticado()) {
        redirect('auth/login');
    }

    $usuario = UsuarioModel_obtenerPorId($id);

    if (!$usuario) {
        $_SESSION['errores'] = ["Usuario no encontrado"];
        redirect('usuario/lista');
        return;
    }

    $eliminado = UsuarioModel_eliminar($id);

    if ($eliminado) {
        $_SESSION['mensaje_exito'] = "Usuario eliminado correctamente";
    } else {
        $_SESSION['errores'] = ["Error al eliminar el usuario"];
    }

    redirect('usuario/lista');
}
?>