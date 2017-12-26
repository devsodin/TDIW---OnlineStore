<?php
    function get_categories($connection){
        $sql = $connection->prepare("SELECT Name, id FROM Category ORDER BY ID");
        $sql->execute();

        $categories = $sql->fetchALl(PDO::FETCH_ASSOC);
        return $categories;

    }

