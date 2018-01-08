<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 02/01/2018
 * Time: 16:55
 */

$connection = connect_db();
$categories = get_categories($connection);
require_once (__ROOT__.'/models/navbar.php');

session_start();


require_once(__ROOT__ . '/models/profile.php');
$userData = getUserData($connection, $_SESSION['id']);

if(isset($_POST['Save'])){
    update_profile($connection);

}

require_once(__ROOT__ . '/views/default/profile.php');