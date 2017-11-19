<?php
    function get_categories($mysql){
        $sql = "SELECT name from category";
        $result = mysqli_query($mysql,$sql);

        if(mysqli_num_rows($result) == 0){
            $result = 'No Categories availables';
        };
        return $result;
    }
?>