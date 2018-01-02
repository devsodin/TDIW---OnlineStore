<?php
    function connect_db(){
        $servername = "localhost";
        $username = "tdiw-d8";
        $password = "zuupoxai";
        $databaseName = 'tdiw-d8';

        try {
            $connection = new PDO('mysql:host='.$servername.';dbname='.$databaseName, $username, $password);
            // set the PDO error mode to exception
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
            return $connection;
        }
        catch(PDOException $error)
        {
            echo "Connection failed: " . $error->getMessage();
            die();
        }
    }

?>