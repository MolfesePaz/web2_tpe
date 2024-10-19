<?php

require_once 'libs/smarty/libs/Smarty.class.php';

class autenticadorView{

    private $user = null;

    function showLogin ($error = ''){  
        global $smarty;
        $smarty = new Smarty();
        $smarty->assign('error', $error);
/*         $smarty->assign('response', $response); */

        $smarty->display('templates/showLogin.tpl');

    }
}