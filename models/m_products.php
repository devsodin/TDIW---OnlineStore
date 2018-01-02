<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 30/12/2017
 * Time: 19:12
 */

function loadProductList($connection){
    $sql = $connection->prepare("SELECT Product.Name AS PName,Product.Active, Product.Price, Category.Name AS CName, Product.Description, Product.Short_description,Product.Image, Product.Id FROM Product,Category WHERE Category.Id = Product.Id_Category");
    $sql->execute();
    $products = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo '<table class="product-table">
  <tr>
    <th>Id
    </th>
    <th>Name</th>
    <th>Active</th>
    <th>Price</th>
    <th>Category</th>
    <th>Description</th>
    <th>Short Description</th>
    <th>Image</th>
  </tr>';
    foreach ($products as $product ){
        if($product['Active'] == 1){
            $product['Active'] = 'Yes';
        }else{
            $product['Active'] = 'No';
        }
        echo"<tr>
        <td>{$product['Id']}</td>
        <td>{$product['PName']}</td>
        <td>{$product['Active']}</td>
        <td>{$product['Price']}</td>
        <td>{$product['CName']}</td>
        <td>{$product['Description']}</td>
        <td>{$product['Short_description']}</td>
        <td></td>
        <td><button type='submit' >Edit</button></td>
      </tr>";
    }
    echo '</table>';
}

