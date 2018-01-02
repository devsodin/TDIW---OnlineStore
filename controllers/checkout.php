<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 30/12/2017
 * Time: 13:38
 */

$connection = connect_db();
$categories = get_categories($connection);
require_once (__ROOT__.'/models/navbar.php');

require_once (__ROOT__.'/models/checkout.php');
require_once (__ROOT__.'/views/default/checkout.php');


?>