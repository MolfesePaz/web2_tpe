<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class abmView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // Inicializar Smarty
        $this->smarty->setTemplateDir('templates/');
        $this->smarty->setCompileDir('templates_c/');
    }

    function showTablaAbm($viajes, $empresas, $usuario, $error = '') {
        // Usar $this->smarty en lugar de la variable global $smarty
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->assign('viajes', $viajes);
        $this->smarty->assign('empresas', $empresas); 
        $this->smarty->assign('error', $error);
        $this->smarty->display('tablaAbm.tpl'); // Puedes omitir 'templates/' porque ya lo estableciste en el constructor
    }
    public function mostrarError($error=''){
        $smarty = new Smarty();
        $smarty->assign('error', $error);
        
        require_once "templates/phtml/error.phtml";
    }

    public function showEditForm($viaje, $empresas) {
        // Asegúrate de que este método está mostrando el formulario correctamente
        $this->smarty->assign('viaje', $viaje);
        $this->smarty->assign('empresas', $empresas);
        $this->smarty->display('showEditForm.tpl'); // Asegúrate de que tienes esta plantilla
    }
}