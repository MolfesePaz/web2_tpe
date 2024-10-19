<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class viajesView{

    function lista($viajes){
        $smarty = new Smarty();
        $smarty->assign('viajes', $viajes);

        $smarty->display('templates/Lista.tpl');
    }
    function showData($viaje){ 
        $smarty = new Smarty();
        $smarty -> assign ('viaje', $viaje);

        $smarty->display('templates/showData.tpl');
    }

    function viajeNoEncontrado(){
        $smarty = new Smarty();

        $smarty->display('templates/errorViajeNoEncontrado.tpl');

    }

}
?>