<?php

include_once('../PHPEnv.php');

$dotenv = new PHPEnv\DotEnv(__DIR__ . '/../.env');
$dotenv->load();


$json_path = __DIR__ . '/credentials.json';
$json = file_get_contents($json_path); 
$json_data = json_decode($json,true); 


try {
    $pdo = new PDO("mysql:host=".$json_data['DB_HOST'].";dbname=".$json_data['DB_NAME'], $json_data['DB_USER'], $json_data['DB_PASS']);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
