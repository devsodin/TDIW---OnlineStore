<?php
require_once (__ROOT__.'/models/products-categories.php');
require_once (__ROOT__.'/models/connect_db.php');
$connection = connect_db();
$categories = get_categories($connection);
require_once(__ROOT__ . '/views/default/navBar.php');

require_once(__ROOT__ . '/views/default/login.php');
?>