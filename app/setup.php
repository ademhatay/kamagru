<?php

$dbHost = ""; // Your database host
$dbName = ""; // Your database name
$dbUser = ""; // Your database username
$dbPass = "";

try {
    $pdo = new PDO("mysql:host=".$dbHost.";dbname=".$dbName, $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    $createTableSql = "
        CREATE TABLE IF NOT EXISTS users (
            _id INT AUTO_INCREMENT PRIMARY KEY,
            _email VARCHAR(255) NOT NULL UNIQUE,
            _password VARCHAR(255) NOT NULL,
            _verification_token VARCHAR(255),
            _verified BOOLEAN NOT NULL DEFAULT FALSE,
            _notification_permission BOOLEAN NOT NULL DEFAULT TRUE
        );
    ";
    $pdo->exec($createTableSql);

    echo "Tablo oluşturuldu. <a href='http://localhost/page/register.php'>Kayıt ol</a> ya da <a href='http://localhost/page/login.php'>giriş yap</a> ve mailinizi doğrulayın.";

} catch (PDOException $e) {
    die("Veritabanı hatası: " . $e->getMessage());
}