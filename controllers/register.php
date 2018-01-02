<?php
$connection = connect_db();
$categories = get_categories($connection);
require_once (__ROOT__.'/models/navbar.php');

require_once (__ROOT__.'/models/register.php');
if(isset($_POST['name'])) {
    register($connection);
}


require_once(__ROOT__.'/views/default/register.php');
?>
