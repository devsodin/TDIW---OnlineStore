<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 27/12/2017
 * Time: 13:22
 */

$connection = connect_db();
require_once (__ROOT__.'/models/navbar.php');

session_start();
if(session_status() == PHP_SESSION_ACTIVE and $_SESSION['Admin']){
    require_once(__ROOT__ . '/views/default/management.php');
}else{
    echo '<h1>ACCESS DENIED </h1>';
}

?>
