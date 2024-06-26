<?php
date_default_timezone_set('Asia/Manila'); 

$db_username = "ezyro_36256704";
$db_password = "49f4aa14690";
$db_name = "ezyro_36256704_ppm";

$conn = new PDO("mysql:host=sql313.ezyro.com;dbname=". $db_name .";charset=utf8",$db_username, $db_password);


//set some pdo attributes

$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);







?>