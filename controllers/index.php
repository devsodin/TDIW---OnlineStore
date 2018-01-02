<?php

$connection = connect_db();
$categories = get_categories($connection);
require_once (__ROOT__.'/models/navbar.php');


require_once(__ROOT__ . '/views/default/index.php');

?>