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
        $token = bin2hex(random_bytes(16));
        $sql = "UPDATE users SET _verified = 1, _verification_token = :token WHERE _id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['token' => $token, 'id' => $user['_id']]);

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


// forgot password
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["forgot_password"])) {
    $email = $_POST["email"];

    if (empty($email)) {
        echo "<script>location.replace('/page/forgot-password.php?error=emptyfields&email=".$email."');</script>";
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>location.replace('/page/forgot-password.php?error=invalidemail');</script>";
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE _email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $token = bin2hex(random_bytes(16));
            $sql = "UPDATE users SET _verification_token = :token WHERE _email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['token' => $token, 'email' => $email]);
            sendVerificationEmail($email, $token);
            echo "<script>location.replace('/page/login.php?success=resetpassword');</script>";
            exit();
        } else {
            echo "<script>location.replace('/page/forgot-password.php?error=emailnotfound');</script>";
            exit();
        }
    }
}

?>
