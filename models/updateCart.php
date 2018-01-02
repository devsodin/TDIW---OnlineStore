<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 28/12/2017
 * Time: 22:04
 */

require_once (__DIR__.'/connect_db.php');
$connection = connect_db();
session_start();
$sql = $connection->prepare("SELECT Id, Price FROM Product ORDER BY Id");
$sql->execute();

$priceProduct = $sql->fetchAll(PDO::FETCH_ASSOC);
$tProducts = 0;
$tPrice = 0;

foreach ($_SESSION['products'] as $prID => $q){
    $tProducts += $q;
    $tPrice += $priceProduct[$prID-1]['Price'] * $q;
}
echo json_encode(array("tproducts" => $tProducts,"tprice" => $tPrice))


?>