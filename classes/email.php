<?php
$filepath = realpath(dirname(__FILE__));
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
// https://accounts.google.com/DisplayUnlockCaptcha
use PHPMailer\PHPMailer\PHPMailer;

include_once($filepath . '/../helpers/format.php');


class email
{
	private $mail;
	private $fm;

	public function __construct()
	{
		$this->mail = new PHPMailer(true);
		$this->mail->isSMTP();
		$this->mail->Host = 'smtp.gmail.com';
		$this->mail->SMTPAuth = true;
		$this->mail->Username  = 'mwstoreeee@gmail.com';
		$this->mail->Password = 'trunghau288';
		$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$this->mail->Port = '587';
		$this->mail->CharSet = 'UTF-8';
		$this->mail->setFrom('mwstoreeee@gmail.com');
		$this->mail->isHTML(true);
		$this->fm = new Format();
	}

	public   function sendEmail($emailReceive, $userCode, $title = 'MWStore: Xác nhận đăng ký tài khoản MWStore.')
	{
		
		$result = true;
		try {

			$this->mail->addAddress($emailReceive); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
			$this->mail->Subject = $title;
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
				 ">MW Store</div>
				<div class="content" style="
				font-family:  Tahoma, Geneva, Verdana, sans-serif;
				padding: 20px 20px;
				margin: 20px 0;
				background-color: rgba(218, 216, 216, 0.322);
				border-radius: 10px;">
					Có ai đó đã sử dụng địa chỉ Email của bạn để đăng ký tài khoản <b>MW Store</b>, nếu chính xác là bạn vui lòng nhấp
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
					background-color: rgba(44, 44, 243, 0.863);"><a href="https://mwstoree.000webhostapp.com/confirmemail.php?code=' . $userCode . '" style=" color: whitesmoke;
			text-decoration: none;">Xác nhận</a></Button>
				</div>
			</div>';
			$this->mail->Body = $contentMail;

			$this->mail->send();
			$_SESSION["userEmail"] = $emailReceive;
			$_SESSION["userCode"] = $userCode;
		} catch (Exception $e) {
			$result = false;
		}

		return $result;
	}

	public   function sendCode($emailReceive, $code, $title = 'MWStore: Xác nhận đăng ký tài khoản MWStore')
	{
		$result = true;

		try {
			$this->mail->addAddress($emailReceive); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
			$this->mail->Subject = $title;
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
				 ">MW Store</div>
				<div class="content" style="
				font-family:  Tahoma, Geneva, Verdana, sans-serif;
				padding: 20px 20px;
				margin: 20px 0;
				background-color: rgba(218, 216, 216, 0.322);
				border-radius: 10px;">
					Có ai đó đã sử dụng địa chỉ Email của bạn để đăng ký tài khoản <b>MW Store</b>, nếu chính xác là bạn vui lòng nhấp
					nhập mã code để xác nhận đăng ký.
				</div>
				<div class="footer">
					<div class="confirm" style="display: block;
					margin: 0 auto;
					border-radius: 20px;
					outline: none;
					border: none;
					box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px,
						rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
					padding: 10px 35px;
					background-color: rgba(44, 44, 243, 0.863);"><div style=" color: whitesmoke;
			text-decoration: none; font-size: 20px; text-align: center; ">' . $code . '</div></div>
				</div>
			</div>';
			$this->mail->Body = $contentMail;

			$this->mail->send();
		} catch (Exception $e) {
			$result = false;
		}

		return $result;
	}


	public   function sendOrder($emailReceive, $datas, $title = 'MWStore: Chi tiết đơn hàng của bạn')
	{
		$result = true;

		try {
			$this->mail->addAddress($emailReceive); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
			$this->mail->Subject = $title;
			$contentMail = '<div style=" margin: 0 auto;
			padding: 20px;
			width: 600px;
			background-color: #f8f8f8;
			border-radius: 10px;">
				<p style="text-align: center;
				font-family: Tahoma, Geneva, Verdana, sans-serif;
				color: #414DD1;
				font-weight: bold;
				text-transform: uppercase;
				font-size: 20px;
				margin: 0;">Đơn hàng</p>
				<table style=" width: 100%;">
					<tr style=" width: 100%;">
						<th style=" width: 35%; font-family:  Tahoma, Geneva, Verdana, sans-serif;
						color: #414DD1;">Tên sản phẩm</th>
						<th style=" width: 15%; font-family:  Tahoma, Geneva, Verdana, sans-serif;
						color: #414DD1;">Số lượng</th>
						<th style="  width: 25%; font-family: Tahoma, Geneva, Verdana, sans-serif;
						color: #414DD1;">Giá</th>
						<th style="  width: 25%; font-family:  Tahoma, Geneva, Verdana, sans-serif;
						color: #414DD1;">Tổng tiền</th>
					</tr>';
			$contentMail .= $datas;
			$contentMail .= '	</table></div>';

			$this->mail->Body = $contentMail;

			$this->mail->send();
		} catch (Exception $e) {
			$result = false;
		}

		return $result;
	}
}
