<?php
	define('DB_SERVIDOR', 'localhost');
	define('DB_USUARIO', 'root');
	define('DB_PASSWORD', '');
	define('DB_NOMBRE', 'db_usuarios');

function conectarDB() {
    $conn = mysqli_connect(DB_SERVIDOR, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
    if (!$conn) {
        die("Error de conexión: ". mysqli_connect_error());
    }
    mysqli_set_charset($conn, 'utf8mb4');
    return $conn;
}
?>
