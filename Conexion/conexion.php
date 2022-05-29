<?php
$contra="";
$user="root";
$Base="crud-php";

try{
    $bd= new PDO(
        'mysql:host=localhost;
        dbname='. $Base,
        $user,
        $contra,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
}catch(Exception $e){
    echo"Problema de conexion".$e->getMessage();
}




?>