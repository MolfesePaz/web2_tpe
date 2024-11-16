<?php 
function verifyAuthMiddleware($response) {
    if($response->user) {
        return;
    } else {
        header('Location: ' . BASE_URL . 'showLogin');
        die();
    }
}
