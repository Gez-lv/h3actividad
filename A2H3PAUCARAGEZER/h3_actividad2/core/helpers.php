<?php
function base_url($ruta = '') {
    $protocolo = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $base = dirname($scriptName);

    return $protocolo . $host . $base . '/' . $ruta;
}

function url($ruta = ''){
    $base = base_url('');
    return $base . 'index.php/' . $ruta; 
}

function post($campo, $defecto=''){
    return $_POST[$campo] ?? $defecto; 
}

function get($campo, $defecto=''){
    return $_GET[$campo] ?? $defecto; 
}

function estaAutenticado(){
    return isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true;
}

function redirect($ruta){
    header('Location: ' . url($ruta));
    exit; 
}
?>