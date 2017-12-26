<?php
define('__ROOT__', __DIR__);

function selectAction(){
    $option = $_GET['action'] ?? 'index';
    switch ($option){
        case 'login':
            include __ROOT__.'/controllers/login.php';
            break;
        case ('register'):
            include __ROOT__.'/controllers/register.php';
            break;
        case ('products'):
            include __ROOT__.'/controllers/products.php';
            break;
        default:
            include __ROOT__.'/controllers/index.php';
            break;
    }
}
selectAction();
?>