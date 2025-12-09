<?php

$dbHost = getenv('MYSQL_HOST');
$dbName = getenv('MYSQL_DATABASE');
$dbUser = getenv('MYSQL_USER');
$dbPass = getenv('MYSQL_PASSWORD');

if (!$dbHost || !$dbName || !$dbUser) {
    $json_path = __DIR__ . '/credentials.json';
    if (file_exists($json_path)) {
        $json = file_get_contents($json_path); 
        $json_data = json_decode($json, true); 
        $dbHost = $json_data['DB_HOST'];
        $dbName = $json_data['DB_NAME'];
        $dbUser = $json_data['DB_USER'];
        $dbPass = $json_data['DB_PASS'];
    } else {
        $dbHost = 'mysql';
        $dbName = 'kamagru';
        $dbUser = 'root';
        $dbPass = '';
    }
}

$pdo = new PDO("mysql:host=".$dbHost.";dbname=".$dbName, $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 

?>
