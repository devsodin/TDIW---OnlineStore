<?php
require_once (__ROOT__.'/models/products-categories.php');
require_once (__ROOT__.'/models/connect_db.php');

$mysql = connect_db();
$products = list_products_by_category($mysql,'');

require_once(__ROOT__ . '/views/default/index.php');

?>