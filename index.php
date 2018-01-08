<?php
define('__ROOT__', __DIR__);
define('__RES_PATH_ABS__', '/home/tdiw-d8/public_html/views/images/');
define('__RES_PATH__', 'views/images/');



function load(){

    require_once(__ROOT__ . '/models/loadCategories.php');
    require_once (__ROOT__.'/models/connect_db.php');

    $option = $_GET['action'] ?? 'index';
    switch ($option){
        #FRONT-END
        case 'logout':
        case 'login':
            include __ROOT__.'/controllers/login.php';
            break;
        case ('register'):
            include __ROOT__.'/controllers/register.php';
            break;
        case ('products'):
            include __ROOT__.'/controllers/products.php';
            break;
        case ('cart'):
            include __ROOT__.'/controllers/cart.php';
            break;
        case ('checkout'):
            include __ROOT__.'/controllers/checkout.php';
            break;
        case ('profile'):
            include __ROOT__.'/controllers/profile.php';
            break;
        #BACK-END
        case ('management'):
            include __ROOT__.'/controllers/management.php';
            break;
        case ('purchases'):
        case('history'):
            include __ROOT__.'/controllers/history.php';
            break;
        case('m_products'):
            include __ROOT__.'/controllers/m_products.php';
            break;
        case('search'):{
            include __ROOT__.'/controllers/search.php';
            break;
        }
        default:
            include __ROOT__.'/controllers/index.php';
            break;
    }
}

load();
?>