<?php
require_once (__ROOT__.'/models/categories.php');
require_once (__ROOT__.'/models/connect_db.php');

$server = 'localhost';
$username = 'tdiw-d8';
$password = 'zuupoxai';
$database_name = 'tdiw-d8';

$mysql = connect_db($server,$username,$password,$database_name);
$categories = get_categories($mysql);

require_once(__ROOT__ . '/views/default/navBar.php');
require_once(__ROOT__ . '/views/default/index.php');

?>