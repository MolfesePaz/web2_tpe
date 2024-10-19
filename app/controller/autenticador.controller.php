<?php
require_once 'app/model/user.model.php';
require_once 'app/view/autenticador.view.php';
require_once 'app/model/empresas.model.php';


class autenticadorController{

    private $model;
    private $view;
    private $response; //acceder a información que puede cambiar a lo largo de las diferentes llamadas a métodos.

    public function __construct($response, $usuario = null){
        $this->model = new userModel();
        $this->view = new autenticadorView($usuario); 
        $this->response = $response; // Guardar el objeto de respuesta
    }
    function Login(){
        //muestro el formulario
        return $this->view->showLogin();
    }

    function ingresar(){

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->view->showLogin();
        }

        if(!isset($_POST['nombre']) || empty($_POST['nombre'])){
            return $this->view->showLogin('falta completar el nombre de usuario');
        }
        if(!isset($_POST['contraseña']) || empty($_POST['contraseña'])){
            return $this->view->showLogin('falta completar la contraseña');
        }

        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        //verifico q el usuario esta en la DB

        $userFromDB=$this->model->getUserByNombre($nombre);
            //guardo en la sesion el ID del usuario
        if($userFromDB && password_verify($contraseña,$userFromDB->contraseña)){

            session_start();
            $_SESSION['ID_USER']= $userFromDB->id;
            $_SESSION['NOMBRE_USER']= $userFromDB->nombre;
            $_SESSION['LAST_ACTIVITY']= time();

            //redirijo al home
            header('location: ' . BASE_URL . 'list');
            return;
        }else{
            return $this->view->showLogin('Informacion ingresada incorrecta');
        }
    }
    public function logout(){
        session_start(); // Inicia la sesión

            // Destruye todas las variables de sesión
            $_SESSION = [];

            // Si se desea destruir la sesión completamente, borra también la cookie de sesión
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }

            // Finalmente, destruye la sesión
            session_destroy();

            // Redirige al usuario al inicio (puedes cambiar 'list' por la página que desees)
            header('Location: ' . BASE_URL . 'list');
            exit();
        }
}
