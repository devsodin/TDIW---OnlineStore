<?php
function connect_db($server, $username, $password, $database_name){
    $mysql = new mysqli($server, $username, $password, $database_name);
    if ($mysql->connect_error){
        echo 'Error connecting Database. Error: ' .$mysql->connect_error;
        exit();
    }
    return $mysql;
}
?>