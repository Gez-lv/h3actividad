<?php

function UsuarioModel_obtenerTodos() {
    $conn = conectarDB();
    $resultado = mysqli_query($conn, "SELECT id, usuario, email, fecha_registro FROM usuarios ORDER BY fecha_registro DESC");

    if (!$resultado) {
        die("Error SQL: " . mysqli_error($conn));
    }

    $usuarios = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $usuarios[] = $fila;
    }

    mysqli_close($conn);
    return $usuarios;
}

function UsuarioModel_obtenerPorId($id) {
    $conn = conectarDB();
    $id = mysqli_real_escape_string($conn, $id);

    $resultado = mysqli_query($conn, "SELECT id, usuario, email, fecha_registro FROM usuarios WHERE id = '$id'");

    if (!$resultado) {
        die("Error SQL: " . mysqli_error($conn));
    }

    $usuario = mysqli_fetch_assoc($resultado);

    mysqli_close($conn);
    return $usuario ?: false;
}

function UsuarioModel_crear($usuario, $email, $password) {
    $conn = conectarDB();

    $usuario = mysqli_real_escape_string($conn, $usuario);
    $email = mysqli_real_escape_string($conn, $email);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (usuario, email, password_hash) 
            VALUES ('$usuario', '$email', '$password_hash')";

    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        die("Error SQL: " . mysqli_error($conn));
    }

    $id = mysqli_insert_id($conn);

    mysqli_close($conn);
    return $id;
}

function UsuarioModel_actualizar($id, $usuario, $email) {
    $conn = conectarDB();

    $id = mysqli_real_escape_string($conn, $id);
    $usuario = mysqli_real_escape_string($conn, $usuario);
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "UPDATE usuarios 
            SET usuario = '$usuario', email = '$email' 
            WHERE id = '$id'";

    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        die("Error SQL: " . mysqli_error($conn));
    }

    mysqli_close($conn);
    return $resultado;
}

function UsuarioModel_eliminar($id) {
    $conn = conectarDB();

    $id = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM usuarios WHERE id = '$id'";

    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        die("Error SQL: " . mysqli_error($conn));
    }

    mysqli_close($conn);
    return $resultado;
}

function UsuarioModel_existe($usuario, $email) {
    $conn = conectarDB();

    $usuario = mysqli_real_escape_string($conn, $usuario);
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT id FROM usuarios WHERE usuario = '$usuario' OR email = '$email'";
    $resultado = mysqli_query($conn, $sql);

    if (!$resultado) {
        die("Error SQL: " . mysqli_error($conn));
    }

    $existe = mysqli_num_rows($resultado) > 0;

    mysqli_close($conn);
    return $existe;
}
?>