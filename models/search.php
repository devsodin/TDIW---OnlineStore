<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 02/01/2018
 * Time: 13:05
 */

require_once (__DIR__.'/connect_db.php');
$connection = connect_db();

if(isset($_GET['q']) and !empty($_GET['q'])) {
    $query = $_GET['q'];
}else{
    $query = "";
}

$sql = $connection->prepare("SELECT * FROM Product WHERE Active = '1' AND Product.Name LIKE CONCAT('%',?,'%') OR Product.Description LIKE CONCAT('%',?,'%') ORDER BY ID");
$sql->execute(array($query,$query));


$results = $sql->fetchALl(PDO::FETCH_ASSOC);


require_once (__DIR__.'/products.php');
print_products($results);


?>