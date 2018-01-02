<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 30/12/2017
 * Time: 18:05
 */

$connection = connect_db();
require_once (__ROOT__.'/models/navbar.php');
require_once (__ROOT__.'/models/m_products.php');

session_start();
if(session_status() == PHP_SESSION_ACTIVE and $_SESSION['Admin']){
    $mode = $_GET['m'];
    echo $mode;
    switch ($mode){
        case 'list':
            loadProductList($connection);
            break;
        case 'add':
            if(isset($_POST['pName'])){
                require_once (__ROOT__.'/models/upload.php');
                uploadProduct($connection);
                break;
            }
            require_once (__ROOT__.'/views/default/upload-product.php');
            break;



    }
}else{
    echo '<h1>ACCESS DENIED </h1>';
}

?>