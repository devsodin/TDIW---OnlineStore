<?php
require_once(__ROOT__ . '/models/loadCategories.php');
require_once (__ROOT__.'/models/connect_db.php');
$connection = connect_db();
$categories = get_categories($connection);
require_once(__ROOT__ . '/views/default/navBar.php');

$catID = $_GET['catID'] ?? 'none';
get_cat_products($connection,$catID);

require_once(__ROOT__ . '/views/default/product.php');

?>