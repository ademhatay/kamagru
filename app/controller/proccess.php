<?php


include_once '../models/user.php';
include_once '../controller/db.php';
include_once '../controller/functions.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["register"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    $verification_token = bin2hex(random_bytes(16));

    if (empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: /page/register.php?error=emptyfields&email=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /page/register.php?error=invalidemail");
        exit();
    } else if ($password !== $confirm_password) {
        header("Location: /page/register.php?error=passwordcheck&email=".$email);
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE _email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            header("Location: /page/register.php?error=emailtaken");
            exit();
        } else {
            $sql = "INSERT INTO users (_email, _password, _verification_token) VALUES (:email, :password, :verification_token)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT), 'verification_token' => $verification_token]);
            $sql = "SELECT * FROM users WHERE _email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            sendVerificationEmail($result['_email'], $result['_verification_token']);
            if ($result) {
                echo "<script>location.replace('/page/login.php?success=registered');</script>";
                exit();
            } else {
                echo "<script>location.replace('/page/register.php?error=sqlerror');</script>";
                exit();
            }
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        header("Location: /page/login.php?error=emptyfields&email=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: /page/login.php?error=invalidemail");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE _email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            if (password_verify($password, $result['_password'])) {
                // if user accouny is not verified redirect to login page
                if (!$result['_verified']) {
                    header("Location: /page/login.php?error=notverified");
                    exit();
                } else {
                    // if user account is verified redirect to app page
                    session_start();
                    $_SESSION['user'] = new User($result['_id'], $result['_email'], $result['_password'], $result['_verified']);
                    header("Location: /page/app.php?success=loggedin");
                    exit();
                }
            } else {
                header("Location: /page/login.php?error=wrongpassword");
                exit();
            }
        } else {
            header("Location: /page/login.php?error=nouser");
            exit();
        }
    }
}


?>
