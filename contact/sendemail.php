<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";

$mail = new PHPMailer(true);

$alert = '';

try {
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username  = 'haudevit@gmail.com'; // Gmail address which you want to use as SMTP server
  $mail->Password = 'hauit2881573'; // Gmail address Password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = '587';
  $mail->CharSet = 'UTF-8';
  $mail->setFrom('haudevit@gmail.com'); // Gmail address which you used as SMTP server
  $mail->addAddress('crtrunghau@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

  $mail->isHTML(true);
  $mail->Subject = 'Nhập';
  $content = 'http://' . 'google.com.vn';
  $mail->Body = '<h3>Bấm vào <a href="https://www.youtube.com/watch?v=icbtPFvjP2E">đây </a> để xác nhận đăng ký</h3>';

  $mail->send();
  $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
} catch (Exception $e) {
  $alert = '<div class="alert-error">
                <span>' . $e->getMessage() . '</span>
              </div>';
}
