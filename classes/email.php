<?php

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;


class email
{
	public   function sendEmail($username, $emailReceive, $userCode, $title = 'HTStore: Xác nhận đăng ký tài khoản HTStore.')
	{
		$result = true;

		$mail = new PHPMailer(true);

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
			$mail->addAddress($emailReceive); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

			$mail->isHTML(true);
			$mail->Subject = $title;
			// $content = 'http://' . 'google.com.vn';
			$mail->Body = '<h3>Bấm vào <a href="http://localhost/webshop/confirmemail.php?code=' . $userCode . '">đây </a> để xác nhận đăng ký</h3>';

			$mail->send();
			Session::set("username", $username);
			Session::set("userCode", $userCode);
		} catch (Exception $e) {
			$result = false;
		}

		return $result;
	}
}
