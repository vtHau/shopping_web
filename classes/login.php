<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../lib/session.php');
Session::checkLogin(); // gọi hàm check login để ktra session
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class adminLogin
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function checkLogin($adminUser, $adminPass)
	{
		$adminUser = $this->fm->validation($adminUser); //gọi ham validation từ file Format để ktra
		$adminPass = $this->fm->validation($adminPass);

		$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
		$adminPass = mysqli_real_escape_string($this->db->link, $adminPass); //mysqli gọi 2 biến. (adminUser and link) biến link -> gọi conect db từ file db

		if (empty($adminUser) || empty($adminPass)) {
			$alert = "Bạn chưa nhập đầy đủ thông tin";
			return $alert;
		} else {
			$query = "SELECT * FROM tbl_admin WHERE (adminUser = '$adminUser' AND adminPass = '$adminPass') OR (adminEmail = '$adminUser' AND adminPass = '$adminPass') LIMIT 1 ";
			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();

				if (($value["adminUser"] == $adminUser && $value["adminPass"] == $adminPass) || ($value["adminEmail"] == $adminUser && $value["adminPass"] == $adminPass)) {
					Session::set('adminLogined', true);
					Session::set('adminID', $value['adminID']);
					Session::set('adminUser', $value['adminUser']);
					Session::set('adminName', $value['adminName']);
					Session::set('adminImage', $value['adminImage']);
					Session::set('adminDescription', $value['adminDescription']);
					header("Location:index.php");
				} else {
					$alert = "Tài khoản hoặc mật khẩu không đúng";
					return $alert;
				}
			} else {
				$alert = "Tài khoản hoặc mật khẩu không đúng";
				return $alert;
			}
		}
	}

	public function signinRequest($adminEmail, $adminPass)
	{
		$adminEmail = $this->fm->validation($adminEmail);
		$adminPass = $this->fm->validation($adminPass);
		// $adminEmail = mysqli_real_escape_string($this->db->link, $adminEmail);

		if (empty($adminEmail) || empty($adminPass)) {
			return false;
		} else {
			$query = "SELECT adminID , adminName , adminEmail , adminImage , adminDescription FROM tbl_admin WHERE adminEmail = '$adminEmail' AND adminPass = '$adminPass' ";
			$result = $this->db->select($query);

			if ($result) {
				return $result;
			} else {
				return false;
			}
		}
	}

	public function getAdminInfo($adminEmail)
	{
		$query = "SELECT adminID , adminName , adminEmail , adminImage , adminDescription FROM tbl_admin WHERE adminEmail = '$adminEmail' ";

		$result = $this->db->select($query);

		if ($result) {
			return $result;
		} else {
			return false;
		}
	}
}
?>