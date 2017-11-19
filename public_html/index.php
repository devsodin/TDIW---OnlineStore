<?php
define('__ROOT__', __DIR__);

require (__DIR__.'./controllers/navBar.php');

function selectAction(){
    $option = $_GET['action'] ?? 'index';
    switch ($option){
        case ('products'):
            include __DIR__.'/controllers/products.php';
            break;
        case ('product_details'):
            include __DIR__ . '/controllers/product_detail.php';
            break;
        case 'login':
            include __DIR__.'/controllers/login.php';
            break;
        case ('register'):
            include __DIR__.'/controllers/register.php';
            break;
        default:
            include __DIR__.'/controllers/index.php';
            break;
    }
}
selectAction();
?>