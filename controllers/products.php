<?php

$connection = connect_db();
$categories = get_categories($connection);
require_once (__ROOT__.'/models/navbar.php');


$catID = $_GET['catID'] ?? 'none';

require_once(__ROOT__ . '/views/default/product.php');

?>