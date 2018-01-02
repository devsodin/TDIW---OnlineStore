<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 26/12/2017
 * Time: 17:10
 */


require_once (__DIR__.'/connect_db.php');
$connection = connect_db();

if(isset($_GET['catID'])){
    $catID = $_GET['catID'];
}else{
    $catID = '0';

}

if($catID != '0'){
    $sql = $connection->prepare("SELECT Name,Short_description,Id,Image,Price FROM Product WHERE Active = '1' AND id_Category = ? ORDER BY ID");
    $sql->execute(array($catID));
}else{
    $sql = $connection->prepare("SELECT Name,Short_description,Id,Image,Price FROM Product WHERE Active = '1' ORDER BY ID");
    $sql->execute();
}
$cat_products = $sql->fetchALl(PDO::FETCH_ASSOC);

require_once (__DIR__.'/products.php');
print_products($cat_products);
?>