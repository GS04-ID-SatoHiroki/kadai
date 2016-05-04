<?php

$hostname = "localhost";
$username = "root";
$password1 = "";
$dbname = "myfirstdatabase";

//making the connection to mysql

$dbc = mysqli_connect($hostname, $username, $password1, $dbname) OR die("データベースに接続できませんでした。, ERROR: ".mysql_connect_error());

//set encoding

mysqli_set_charset($dbc, "utf8");

echo "<p>".$dbname."に接続中</p>";

?>