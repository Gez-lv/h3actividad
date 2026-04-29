<?php

function view($vista, $datos = []) {
  
    extract($datos);
     
   
    $archivo = 'views/' . str_replace('.','/', $vista) . '.php';

    if(!file_exists($archivo)) {
        die("Error: La vista '$vista' no encontrada");
    }

    //construir el layout
    require_once('views/layout/header.php');
    require_once $archivo;
    require_once('views/layout/footer.php');
}

function model($nombre) {
    $archivo = 'models/' . $nombre . '.php';
    
    if(!file_exists($archivo)) {
        require_once $archivo;
        return true;
    }
    return false;
}

?>