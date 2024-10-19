<?php
require_once 'app/model/viajes.model.php';
require_once 'app/view/viajes.vista.php';
require_once 'app/model/abm.model.php';
require_once 'app/view/abm.view.php';
require_once 'app/model/empresas.model.php';

class viajesController{

    private $model;
    private $view;

    public function __construct(){
        $this->model = new viajesModel();
        $this->view = new viajesView(); 
    }

    public function showList(){
        // Llamar al modelo para obtener la lista de viajes
        $viajes = $this->model->getViajes();

        // Llamar a la vista para mostrar la lista de viajes
        $this->view->lista($viajes);
    }

    public function showId($id) {
        $viaje = $this->model-> getViajeId($id); // Llama al modelo para obtener el viaje
    
        if (!$viaje) {
            $this->view->viajeNoEncontrado(); // Maneja el error de viaje no encontrado
        } else {
            $this->view->showData($viaje); // Muestra los detalles del viaje
        }
    }

    public function showName($destino) {
        $viaje =   $this -> model ->  getByName($destino); // Llama al modelo para obtener el viaje por destino
    
        if (!$viaje) {
 /*            echo 'Error: Viaje no encontrado'; // Muestra un mensaje de error */
            $this->view->viajeNoEncontrado(); // Llama a la vista para manejar la página de error
        } else {
            $this->view->showData($viaje); // Muestra los detalles del viaje
        }
    }   
}
class abmController{

    private $model;
    private $view;
    private $usuario;
    private $modelViajes;
    private $empresasModel;

    public function __construct($usuario = null) {
        $this->model = new viajesAbmModel;
        $this->modelViajes = new viajesModel;
        $this->view = new abmView;
        $this->empresasModel = new empresasModel;
        $this->usuario = $usuario;
    }

    public function mostrarTabla() {
        // Verificar si el usuario ha iniciado sesión
        session_start(); 
        if (!isset($_SESSION['ID_USER'])) {
            // Redirigir al usuario a la página de login si no está autenticado
            header('Location: ' . BASE_URL . 'showLogin');
            return;
        }
        $viajes = $this->model->getAllViajes(); //tomo todos los viajes
        $empresas = $this->empresasModel->getAllEmpresas();// Obtener empresas

        
        $this->view->showTablaAbm($viajes, $empresas, $this->usuario);
    }

     public function agregarViaje() {

    if (!isset($_POST['origen']) || !isset($_POST['destino']) || !isset($_POST['FechaDeSalida']) || !isset($_POST['FechaDeLlegada']) || !isset($_POST['id_empresa'])) {
        return $this->view->mostrarError('Falta completar algun campo');
    }

    $origen=$_POST['origen'];
    $destino=$_POST['destino'];
    $FechaDeSalida=$_POST['FechaDeSalida'];
    $FechaDeLlegada=$_POST['FechaDeLlegada'];
    $id_empresa = $_POST['id_empresa'];

    $this->model->insertViaje($origen, $destino, $FechaDeSalida, $FechaDeLlegada, $id_empresa);

    header('Location: ' . BASE_URL . 'tablaAbm');
    return;
}

    // Eliminar un viaje existente
    public function eliminarViaje($id) {
        $viaje = $this->modelViajes->getViajeId($id);
        if(!$viaje){
            $this->view->mostrarError("el viaje a eliminar no existe");
        }

        $this->model->deleteViaje($id);

        header('Location: ' . BASE_URL . 'tablaAbm');
        return;
    }

    // Editar un viaje existente
    public function modificarViaje($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $viaje = $this->model->getViajeById($id);
            $empresas = $this->empresasModel->getAllEmpresas();
            if (!$viaje) {
                return $this->view->mostrarError("El viaje " . $id . " a editar no existe");
            }
            // Muestra el formulario de edición con los datos del viaje
            return $this->view->showEditForm($viaje, $empresas);
        }
    
        // Asegúrate de que este código solo se ejecuta en POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validar los campos
            if (empty($_POST['origen']) || empty($_POST['destino']) || empty($_POST['FechaDeSalida']) || empty($_POST['FechaDeLlegada']) || empty($_POST['id_empresa'])) {
                return $this->view->mostrarError('Todos los campos son requeridos');
            }
    
            // Procesar la actualización
            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $fechaSalida = $_POST['FechaDeSalida'];
            $fechaLlegada = $_POST['FechaDeLlegada'];
            $id_empresa = $_POST['id_empresa'];
    
            $this->model->updateViaje($id, $origen, $destino, $fechaSalida, $fechaLlegada, $id_empresa);
            
            header('Location: ' . BASE_URL . 'tablaAbm');
            return;
        }
    }
}

?>