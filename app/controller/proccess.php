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
        echo "<script>location.replace('/page/register.php?error=emptyfields');</script>";
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>location.replace('/page/register.php?error=invalidemail');</script>";
        exit();
    } else if ($password !== $confirm_password) {
        echo "<script>location.replace('/page/register.php?error=passwordsdontmatch');</script>";
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE _email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo "<script>location.replace('/page/register.php?error=emailtaken');</script>";
            exit();
        } else {
            $sql = "INSERT INTO users (_email, _password, _verification_token) VALUES (:email, :password, :verification_token)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email, 'password' => password_hash($password, PASSWORD_DEFAULT), 'verification_token' => $verification_token]);
            $sql = "SELECT * FROM users WHERE _email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['email' => $email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $path = __DIR__ . "./../views/email-verification-template.html";

            $email_template = file_get_contents($path);
    
            $email_template = str_replace("{{token}}", $result['_verification_token'], $email_template);
            sendVerificationEmail($result['_email'], $email_template , "Verify your email address");
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
       echo "<script>location.replace('/page/login.php?error=emptyfields');</script>";
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>location.replace('/page/login.php?error=invalidemail');</script>";
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
                    echo "<script>location.replace('/page/login.php?error=notverified');</script>";
                    exit();
                } else {
                    // if user account is verified redirect to app page
                    session_start();
                    $_SESSION['user'] = new User($result['_id'], $result['_email'], $result['_password'], $result['_verified']);
                    echo "<script>location.replace('/page/app.php');</script>";
                    exit();
                }
            } else {
                echo "<script>location.replace('/page/login.php?error=wrongpassword');</script>";
                exit();
            }
        } else {
            echo "<script>location.replace('/page/login.php?error=nouser');</script>";
            exit();
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["forgot_password"])) {
    $email = $_POST["email"];

    if (empty($email)) {
        echo "<script>location.replace('/page/forgot-password.php?error=emptyfields');</script>";
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
            $path = __DIR__ . "./../views/forgot-password-template.html";

            $email_template = file_get_contents($path);
    
            $email_template = str_replace("{{token}}", $result['_verification_token'], $email_template);
            sendVerificationEmail($result['_email'], $email_template , "Reset your password");
            echo "<script>location.replace('/index.php?success=mailsent');</script>";
            exit();
        } else {
            echo "<script>location.replace('/page/forgot-password.php?error=nouser');</script>";
            exit();
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["new_password"])) {
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];


    $token = $_POST['token'];


    if (empty($password) || empty($password_repeat)) {
        echo "<script>location.replace('/page/reset-password.php?error=emptyfields');</script>";
        exit();
    } else if ($password !== $password_repeat) {
        echo "<script>location.replace('/page/reset-password.php?error=passwordsdontmatch');</script>";
        exit();
    } else {
        $sql = 'SELECT * FROM users WHERE _verification_token = :token';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['token' => $token]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        echo $result['_id'];

        if ($result) {
            $newPassword = password_hash($password, PASSWORD_DEFAULT);
            $userId = $result['_id'];
            
           // update password and  chane verification token
            $sql = "UPDATE users SET _password = :password, _verification_token = :token WHERE _id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['password' => $newPassword, 'token' => bin2hex(random_bytes(16)), 'id' => $userId]);

            echo "<script>location.replace('/page/login.php?success=passwordchanged');</script>";
            exit();
        } else {
            echo "<script>location.replace('/page/reset-password.php?error=invalidtoken');</script>";
            exit();
        }
    }
}

?>
