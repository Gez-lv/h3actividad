<?php
class Router {
    public function dispatch() {
        $ruta = '';

        if (isset($_SERVER['PATH_INFO'])) {
            $ruta = $_SERVER['PATH_INFO'];
        } else {
            $uri = $_SERVER['REQUEST_URI'];
            $scriptName = $_SERVER['SCRIPT_NAME'];

           
            $pos = strpos($uri, 'index.php');

            if ($pos !== false) {
                $ruta = substr($uri, $pos + 9);
            } else {
                $ruta = $uri;
            }
        }

        // Quitar query string
        $ruta = strtok($ruta, '?');

     
        $base = dirname($_SERVER['SCRIPT_NAME']); 
        $ruta = str_replace($base, '', $ruta);

        $ruta = ltrim($ruta, '/');

   
        if (empty($ruta)) {
            $this->llamarControlador('Home', 'index', []);
            return;
        }

        
        $segmentos = explode('/', $ruta);

        
        $controlador = ucfirst(str_replace('-', '', $segmentos[0]));
        array_shift($segmentos);

       
        $accion = !empty($segmentos) ? $segmentos[0] : 'index';
        array_shift($segmentos);

     
        $parametros = $segmentos;

        $this->llamarControlador($controlador, $accion, $parametros);
    }

    private function llamarControlador($controlador, $accion, $parametros) {

        $nombreControlador = $controlador . 'Controller';
        $archivoControlador = 'controllers/' . $nombreControlador . '.php';

        if (!file_exists($archivoControlador)) {
            die("Error: Controlador '$controlador' no encontrado");
        }

        require_once $archivoControlador;

        $funcion = $nombreControlador . '_' . $accion;

        if (!function_exists($funcion)) {
            die("Error: Acción '$accion' no encontrada en controlador '$controlador'");
        }

        call_user_func_array($funcion, $parametros);
    }
}
?>