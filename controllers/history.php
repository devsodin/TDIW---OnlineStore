<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 30/12/2017
 * Time: 18:05
 */

$connection = connect_db();
require_once (__ROOT__.'/models/navbar.php');
require_once (__ROOT__.'/models/order-history.php');

session_start();
if(session_status() == PHP_SESSION_ACTIVE){
    if($_SESSION['Admin']){
        loadStoreHistory($connection);
        require_once(__ROOT__ . '/views/default/order-history.php');
    }else{
        loadUserHistory($connection,$_SESSION['id']);
    }

}else{
    echo '<h1>ACCESS DENIED </h1>';
}

?>