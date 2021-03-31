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
			$contentMail = '<div class="container" style="
			margin: 0 auto;
			padding: 20px;
			width: 300px;
			background-color: #eee;
			border-radius: 10px;
			box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
				rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
				<div class="header" style=" text-align: center;
				font-size: 30px;
				font-weight: bold;
				font-family:  Tahoma, Geneva, Verdana, sans-serif;
				 ">HT Store</div>
				<div class="content" style="
				font-family:  Tahoma, Geneva, Verdana, sans-serif;
				padding: 20px 20px;
				margin: 20px 0;
				background-color: rgba(218, 216, 216, 0.322);
				border-radius: 10px;">
					Có ai đó đã sử dụng địa chỉ Email của bạn để đăng ký tài khoản <b>HT Store</b>, nếu chính xác là bạn vui lòng nhấp
					vào nút xác nhận để kích hoạt tài khoản.
				</div>
				<div class="footer">
					<Button class="confirm" style="display: block;
					margin: 0 auto;
					border-radius: 20px;
					outline: none;
					border: none;
					box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
						rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
					padding: 10px 35px;
					background-color: rgba(44, 44, 243, 0.863);"><a href="http://localhost/webshop/confirmemail.php?code=' . $userCode . '" style=" color: whitesmoke;
			text-decoration: none;">Xác nhận</a></Button>
				</div>
			</div>';
			$mail->Body = $contentMail;

			$mail->send();
			Session::set("username", $username);
			Session::set("userCode", $userCode);
		} catch (Exception $e) {
			$result = false;
		}

		return $result;
	}
}

// http://localhost/webshop/confirmemail.php?code=' . $userCode . '"