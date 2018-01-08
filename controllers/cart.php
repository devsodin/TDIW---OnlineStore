<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 29/12/2017
 * Time: 19:50
 */

$connection = connect_db();
$categories = get_categories($connection);
session_start();
require_once (__ROOT__.'/models/navbar.php');

require_once (__ROOT__.'/models/cart.php');
require_once (__ROOT__.'/views/default/cart.php');

?>