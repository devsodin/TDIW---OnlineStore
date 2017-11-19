<?php
    function get_categories($mysql){
        $sql = "SELECT name from category";
        $categories = mysqli_query($mysql,$sql);

        if(mysqli_num_rows($categories) == 0){
            $categories = 'No Categories availables';
        };
        return $categories;
    }

    function list_products_by_category($mysql,$category){
        if ($category == ''){
            $sql = 'SELECT name,short_description,image FROM product WHERE active=1';
        }
        else{
            $sql = 'SELECT name, short_description,image FROM product WHERE id_category='.$category.'AND active=1';
        }
        $products = mysqli_query($mysql,$sql);

        if(mysqli_num_rows($products) == 0){
            $products = 'No products availables';
        };
        return $products;
    }

    function format_products_list($products){
        $listproduct = array();
        for($i =0;mysqli_num_rows($products);$i++){
            $row = mysqli_fetch_row($products);
            array_push($listproduct,'<br/><div class="column"><img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="image here" class="product-image"><div class="product-data"><h4>'.$row['name'].'</h4><p>'.row['short_description'].'</p></div></div>');
        }
        return $listproduct;
    }

    function product_details($mysql,$product, $category){

    }
?>