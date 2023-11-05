<?php

$json_path = __DIR__ . '/credentials.json';
$json = file_get_contents($json_path); 
$json_data = json_decode($json,true); 

$pdo = new PDO("mysql:host=".$json_data['DB_HOST'].";dbname=".$json_data['DB_NAME'], $json_data['DB_USER'], $json_data['DB_PASS']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

?>
