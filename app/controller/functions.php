<?php

require_once(__DIR__ . "./../assets/PHPMailer/src/PHPMailer.php");
require_once(__DIR__ . "./../assets/PHPMailer/src/SMTP.php");
include_once('../PHPEnv.php');


$dotenv = new PHPEnv\DotEnv(__DIR__ . '/../.env');
$dotenv->load();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    function sendVerificationEmail($userEmail, $template, $subject)
    {
        $mail = new PHPMailer(true);

        $mail->CharSet = 'UTF-8';

        try {
            // SMTP ayarları
            $mail->isSMTP();
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = getenv('MAIL_HOST');
            $mail->Port = getenv('MAIL_PORT');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = getenv('MAIL_USERNAME');
            $mail->Password = getenv('MAIL_PASS');

            $mail->setFrom(getenv('MAIL_USERNAME'), 'Kamagru');
            $mail->addAddress($userEmail);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $template;
            
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'E-posta gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
            return false;
        }
    }


    function convertHashtags($metin) {
        $kelimeler = preg_grep("/^#(.*)$/", explode(" ", $metin));
      
        foreach ($kelimeler as $kelime) {
          $metin = str_replace($kelime, "<span style='color: rgb(0, 55, 107); cursor: pointer'>$kelime</span>", $metin);
        }
      
        return $metin;
      }

?>
