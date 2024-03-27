<?php
$db_username = "root";
$db_password = "";
$db_name = "ppm_database";

$conn = new PDO("mysql:host=127.0.0.1;dbname=". $db_name .";charset=utf8",$db_username, $db_password);


//set some pdo attributes

$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);







?>