<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 26/12/2017
 * Time: 17:10
 */

require_once (__DIR__.'/connect_db.php');
$connection = connect_db();

$catID = $_GET['catID'];

if($catID != 'none'){
    $sql = $connection->prepare("SELECT Name,Short_description,Id,Image FROM Product WHERE Active = '1' AND id_Category = ? ORDER BY ID");
    $sql->execute(array($catID));
}else{
    $sql = $connection->prepare("SELECT Name,Short_description,Id,Image FROM Product WHERE Active = '1' ORDER BY ID");
    $sql->execute();
}
$cat_products = $sql->fetchALl(PDO::FETCH_ASSOC);

foreach($cat_products as $product){
    echo '<div class="product-block" onclick=showDetails('.$product['Id'].')>';
    echo '<div class="column">';
    //echo '<img src="'.$product['image'].'" alt="image here" class="product-image">';
    echo '<img src="data:image/png;base64, '.base64_encode($product['Image']).'" class="product-image">';
    echo '<div class="product-data">';
    echo '<h3 id="product-name">'.$product['Name'].'</h3>';
    echo '<p id="product-sdescription">'.$product['Short_description'].'</p>';
    echo '<p id="product-price">'.$product['Short_description'].' €</p>';
    echo'</div>
   </div>
</div>';
}
?>