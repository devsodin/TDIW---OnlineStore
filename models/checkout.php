<?php
/**
 * Created by PhpStorm.
 * User: Yael Tudela
 * Date: 30/12/2017
 * Time: 13:39
 */

session_start();

function createOrder($connection){
    $sql = $connection->prepare("INSERT INTO Orders (Id_user) VALUES (?)");
    echo $_SESSION['id'];
    $sql->execute(array($_SESSION['id']));
    if($sql){echo 'ok';}else{echo 'nook';}
}

function getOrderId($connection){
    $sql = $connection->prepare("SELECT MAX(Id) FROM Orders");
    $sql->execute();
    $orderId = $sql->fetchColumn(0);


    return $orderId;
}

if(isset($_SESSION['id'])){
    if(isset($_SESSION['products'])){

        createOrder($connection);

        $orderId = getOrderId($connection);

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
                echo 'a';
                if($prID == $product['Id']){
                    $products[$i]['q'] = $q;


                    $sql = $connection->prepare("INSERT INTO Order_product (`Product_id`,`Order_id`,`Quantity`) VALUES (?,?,?)");
                    $sql->execute(array($prID,$orderId,$products[$i]['q']));

                }
            }
            $i++;
        }

        $sql = $connection->prepare("SELECT DISTINCT Product.Name,Order_product.Quantity, Product.Price, (Product.Price * Order_product.Quantity) AS Total_Price FROM Orders, Order_product,User,Product WHERE User.Id = Orders.Id_user AND Orders.Id = Order_product.Order_id AND Order_product.Product_id = Product.Id AND Orders.Id = ?");
        $sql->execute(array($orderId));
        $summary = $sql->fetchAll(PDO::FETCH_ASSOC);

        unset($_SESSION['products']);
        $n = count($summary);
        echo '<h1>Summary</h1>
<div class="summary">';
        $total = 0;
        echo "<div class='order-data'>
    <p>Order ID:{$orderId}</p>
</div>";
        for ($i = 0; $i < $n; $i++){
            echo '<div class="productline">';
            echo "<p>{$summary[$i]['Name']}</p><p>{$summary[$i]['Quantity']}</p><p>{$summary[$i]['Price']}</p><p>{$summary[$i]['Total_Price']}</p>";
            $total += $summary[$i]['Total_Price'];

            echo '</div>';
        }
        $sql = $connection->prepare("UPDATE Orders SET Price = ? WHERE Id = ?");
        $sql->execute(array($total,$orderId));
        echo "</div><h3>{$total}</h3>";

    }else{
        echo 'no products';
    }
}else{
    echo '<script>window.alert("You need to be logged in");
            window.location.replace("index.php?action=login");
        </script>';
}


?>