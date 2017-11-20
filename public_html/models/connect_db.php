<?php

function connect_db(){
    $server = 'localhost';
    $username = 'tdiw-d8';
    $password = 'zuupoxai';
    $database_name = 'tdiw-d8';

    $mysql = new mysqli($server, $username, $password, $database_name);
    if ($mysql->connect_error){
        echo 'Error connecting Database. Error: ' .$mysql->connect_error;
        die("Connection failed: " . $mysql->connect_error);
    }
    $mysql->set_charset('utf-8');


    return $mysql;
}
?>