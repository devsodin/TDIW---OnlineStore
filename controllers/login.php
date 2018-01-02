<?php

$connection = connect_db();
$categories = get_categories($connection);
require_once (__ROOT__.'/models/navbar.php');


require_once (__ROOT__.'/models/login.php');

if(isset($_POST['uname']) and isset($_POST['passwd'])) {
    login($connection);
}

if($_GET['action'] == 'logout'){
    logout();
}else{
    require_once(__ROOT__ . '/views/default/login.php');

}




?>