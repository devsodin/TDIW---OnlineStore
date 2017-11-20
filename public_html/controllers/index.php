<?php
require_once (__ROOT__.'/models/products-categories.php');
require_once (__ROOT__.'/models/connect_db.php');
$mysql = connect_db();
$categories = get_categories($mysql);
require_once(__ROOT__ . '/views/default/navBar.php');



require_once(__ROOT__ . '/views/default/index.php');

?>