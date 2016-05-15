<?php

include ("ChromePhp.php");

$dsn = "mysql:dbname=myfirstdatabase;charset=utf8;host=localhost";
$username = "root";
$password1 = "";

//making the connection to mysql
try{
$pdo = new PDO($dsn,$username,$password1);
}catch(PDOException $e){
    exit('DbConnectError:'.$e->getMessage());
}

//set encoding


?>