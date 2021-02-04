<?php
include_once "./../classes/login.php"
?>

<?php
$login = new adminLogin();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
	$adminUser = $_POST["adminUser"];
	$adminPass = md5($_POST["adminPass"]);

	$checkLogin = $login->checkLogin($adminUser, $adminPass);
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Đăng nhập trang quản trị</title>
	<link rel="stylesheet" type="text/css" href="assets/style/login-style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<img class="wave" src="assets/images/login/wave.png">
	<div class="container">
		<div class="img">
			<img src="assets/images/login/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="POST">
				<img src="assets/images/login/avatar.svg">

				<h2 class="title">Đăng Nhập</h2>

				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Tên người dùng</h5>
						<input id="input-user" type="text" class="input" name="adminUser" required>
					</div>
				</div>
				<h6 style="margin: 0px; font-size: 12px; color: red;" id="noti-user"></h6>

				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Mật khẩu</h5>
						<input id="input-pass" type="password" class="input" name="adminPass" required>
					</div>
				</div>
				<h6 style="margin: 0px; font-size: 12px; color: red;" id="noti-pass"></h6>
				<h6 style="margin-top: 0px; font-size: 12px; color: red;" id="noti-all"></h6>

				<a href="#"></a>

				<?php
				if (isset($checkLogin)) {
					echo '<h6 style="margin-top: 8px; font-size: 12px; color: red;">' . $checkLogin . '</h6>';
				}
				?>

				<input type="submit" id="btn-submit" class="btn" value="Đăng nhập" name="login">
			</form>
		</div>
	</div>
	<script type="text/javascript" src="assets/scripts/login-script.js"></script>
</body>

</html>