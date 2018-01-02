<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 29/12/2017
 * Time: 20:01
 */

session_start();
switch ($_GET['mode']){
    case 'show':
        if(isset($_SESSION['products'])){

            $productstring = '';
            $execparam = [];
            foreach ($_SESSION['products'] as $prID => $q){
                $productstring = $productstring.'`Id`= ? OR ';
                array_push($execparam,$prID);

            }
            $productstring = substr($productstring,0,strlen($productstring)-4);

            $sql = $connection->prepare("SELECT `Name`,`Price`, `Id` FROM Product WHERE {$productstring} ORDER BY `Id`");
            $sql->execute($execparam);
            $products = $sql->fetchAll(PDO::FETCH_ASSOC);


            $i = 0;
            foreach ($products as $product) {
                foreach ($_SESSION['products'] as $prID => $q){
                    if($prID == $product['Id']){
                        $products[$i]['q'] = $q;
                    }
                }
                $i++;
            }

            $i = 0;
            foreach ($_SESSION['products'] as $prID => $q){
                $qp = $products[$i]['q'] * $products[$i]['Price'];
                $priceq[$prID] = $products[$i]['Price'] * $_SESSION['products'][$prID];
                echo "<div class='product-line'>
    <h1 class='product-name'>{$products[$i]['Name']}</h1>
    <p class='product-line-data'>Unit Price: {$products[$i]['Price']}</p>
    <p class='product-line-data'>Quantity: {$products[$i]['q']}</p>
    <p class='product-line-data'>Total Price: {$qp}</p></</br></<br>
</div>";
                $i++;
            }


        }


        break;
    case 'add':
        break;
    case 'update':
        break;
}