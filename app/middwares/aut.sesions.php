<?php

function SesionAutUsuario($response){
    session_start();
    if(isset($_SESSION['ID_USER'])){
        $response->usuario = new stdClass();
        $response->usuario->id = $_SESSION['ID_USER'];
        $response->usuario->nombre = $_SESSION['NOMBRE_USER'];
        return; 
    }else{
        header('location' . BASE_URL . 'list');
        /* $response->usuario = null; */
    }
}

    function vistaEspectador($response){
        session_start();
        if(isset($_SESSION['ID_USER'])){
        $response->usuario = new stdClass();
        $response->usuario->id = $_SESSION['ID_USER'];
        $response->usuario->nombre = $_SESSION['NOMBRE_USER'];
        return;
        }
    }
