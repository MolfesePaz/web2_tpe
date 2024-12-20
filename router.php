<?php
include_once 'app/middwares/verify.sesions.php';
include_once 'app/controller/viajes.controller.php';
include_once 'app/controller/autenticador.controller.php'; 
include_once 'utils/response.php';
include_once 'app/middwares/aut.sesions.php'; 


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$response = new response(); 

$action = 'list';

if (!empty($_GET['action'])) { // si viene definida la reemplazamos
    $action = $_GET['action'];
}else{
    $action = 'list';
}

$params = explode('/', $action);
$navUrl=$params[0];

switch ($params[0]) {
    case 'list':
        $controller = new viajesController();
        $controller->showList();
        break;

    case "detallePorId":
        SesionAutUsuario($response);
       $controller = new viajesController();
       $id = $params[1];
       $controller -> showId($id);
        break;

    case 'detallePorNombre':
        SesionAutUsuario($response);
        $controller = new viajesController();
        $destino = $params[1];
        $controller-> showName($destino);
        break;
    case 'showLogin':
        $controller = new autenticadorController($response);
        $controller->Login();
        break;
    case 'ingresar':  
        SesionAutUsuario($response); 
        $controller = new autenticadorController($response);
        $controller->ingresar();
        break;
    case 'logout':
        $controller = new autenticadorController($response);
        $controller->logout();  
    case 'tablaAbm':
        //SesionAutUsuario($response);
        verifyAuthMiddleware($response);
        $controller = new AbmController($response->usuario);
        $controller->mostrarTabla();
        break;
    case 'add':
        SesionAutUsuario($response);
        verifyAuthMiddleware($response);
        $controller = new abmController($response->usuario);
        $controller->agregarViaje();
        break;
    case 'edit':
        SesionAutUsuario($response);
        verifyAuthMiddleware($response);
        $controller = new abmController($response->usuario);
        $controller->modificarViaje($params[1]);
        break;
    case 'delete':
        SesionAutUsuario($response);
        verifyAuthMiddleware($response);
        $controller = new abmController($response->usuario);
        $controller->eliminarViaje($params[1]);
        break;   
    default:
        echo "<h1>Error 404: Página no encontrada.</h1>";
        break;
}
?>