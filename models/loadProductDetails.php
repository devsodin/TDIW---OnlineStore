<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 26/12/2017
 * Time: 17:10
 */

define('__RPATH__', 'views/images/');


require_once (__DIR__.'/connect_db.php');
$connection = connect_db();
session_start();
$prID = $_GET['prID'];
$sql = $connection->prepare("SELECT * FROM Product WHERE Id = ? ORDER BY ID");
$sql->execute(array($prID));
$cat_products = $sql->fetchALl(PDO::FETCH_ASSOC);



foreach($cat_products as $product){
    $image = __RPATH__.$product['Image'];
    echo "<table class='detail'>
     <tr>
        <td rowspan='3'><img src='{$image}' alt='{$product['Name']}'></td>
        <td><h1>{$product['Name']}</h1></td>
    </tr>
    <tr>
        <td><h3>{$product['Short_description']}</h3></td>
    </tr>
    <tr>
        <td><h3>{$product['Price']} €</h3></td>
    </tr>
    <tr>
        <td><button type='button' id='addCart' onclick='addProduct2Cart({$product['Id']})'>Add to cart</button></td>
      <td>
            <select id=\"quantity\" >
                <option value=\"1\">1</option>
                <option value=\"2\">2</option>
                <option value=\"3\">3</option>
                <option value=\"4\">4</option>
                <option value=\"5\">5</option>
            </select>
        </td>
    </tr>
</table>";
}
?>

