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
    $sql->execute(array($_SESSION['id']));
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
        echo '<table class="product-table"><tr><th colspan="4">Summary</th></tr>';
        $total = 0;
        echo "<tr><th colspan='3'>Order ID</th><th>{$orderId}</th></tr>";
        echo '<tr>
        <th>Name</th>
        <th>Unit Price</th>
        <th>Quantity</th>
        <th>Total</th>
</tr>';
        for ($i = 0; $i < $n; $i++){
            echo "<tr>
    <td>{$summary[$i]['Name']}</td>
    <td>{$summary[$i]['Quantity']}</td>
    <td>{$summary[$i]['Price']}</td>
    <td>{$summary[$i]['Total_Price']}</td>
</tr>";
            $total += $summary[$i]['Total_Price'];

        }
        $sql = $connection->prepare("UPDATE Orders SET Price = ? WHERE Id = ?");
        $sql->execute(array($total,$orderId));
        echo "<tr><td colspan='3'>Total</td><td>{$total}</td></tr>";

    }else{
        echo "<script>window.alert('You must buy some products to proceed checkout');
            location.replace('index.php');
            </script>";
    }
}else{
    echo '<script>window.alert("You need to be logged in");
            window.location.replace("index.php?action=login");
        </script>';
}


?>