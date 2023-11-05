<?php

include_once '../models/user.php';
include_once '../controller/db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE _verification_token = :token";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['token' => $token]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $sql = "UPDATE users SET _verified = 1 WHERE _verification_token = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['token' => $token]);

       echo "<script>location.replace('/page/login.php?success=verified');</script>";
        exit();
    } else {
        // Token geçersiz veya kullanılmış
        echo "<script>location.replace('/page/login.php?error=invalidtoken');</script>";
        exit();
    }
} else {
    // Token yok
    echo "<script>location.replace('/page/login.php?error=notoken');</script>";
    exit();
}

?>
