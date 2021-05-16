<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
include_once "email.php";
?>

<?php
class user
{
	private $db;
	private $fm;
	private $email;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
		$this->email = new email();
	}



	public function getUserID()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}
		return $userID;
	}

	public function getUserByID($userID)
	{
		$query = "SELECT * FROM tbl_user WHERE userID = '$userID'";
		$result = $this->db->select($query);

		return $result;
	}

	public function getInfoUser()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}
		$query = "SELECT userID ,  userFullName , userImage , userPhone , userEmail , userStatus FROM tbl_user WHERE userID = '$userID'";
		$result = $this->db->select($query);

		return $result;
	}

	public function getAllUser()
	{
		$query = "SELECT * FROM tbl_user";
		$result = $this->db->select($query);

		return $result;
	}



	public function loginCustomer($data)
	{
		$userEmail = mysqli_real_escape_string($this->db->link, $data["userEmail"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);

		if ($userEmail == "" || $password == "") {
			$alert = "<span class='error'>Vui long hoan thanh cac truong</span>";
			return $alert;
		} else {
			$password = md5($password);
			$query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail' AND password = '$password'";
			$result = $this->db->select($query);

			if ($result) {
				$value = $result->fetch_assoc();
				$isBlock = $value["userBlock"];
				$userEmail = $value["userEmail"];
				$userCode = $value["userActive"];

				if ($isBlock < 5) {
					if ($value["userActive"] != 1) {
						Session::set("userCode", $value["userActive"]);
						$userCode =  "MWStore:" . strval(md5(time())) . strval(md5($userEmail));
						$sendEmail = $this->email->sendEmail($userEmail, $userCode);
						if ($sendEmail) {
							header("Location: reconfirm.php");
						}
					} else {
						Session::set("userBlock", false);
						Session::set("userLogin", true);
						$_SESSION["userLogin"] = true;
						Session::set("loginToast", 0);
						Session::set("userID",  $value["userID"]);
						Session::set("userFullName",  $value["userFullName"]);
						Session::set("userImage",  $value["userImage"]);
						unset($_SESSION["userCode"]);
						$userID =  $value["userID"];
						$lastLogin = time() + 10;
						$query = "UPDATE tbl_user SET userLastLogin = '$lastLogin' WHERE userID = '$userID'";
						$this->db->update($query);
						if (Session::get("userLogin") === true) {
							header("Location: index.php");
						}
					}
				} else {
					Session::set("userBlock", true);
					Session::set("userID",  $value["userID"]);
					Session::set("userFullName",  $value["userFullName"]);
					header("Location: userblock.php");
				}
			} else {
				$query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail'";
				$result = $this->db->select($query);

				if ($result) {
					$value = $result->fetch_assoc();
					$userID = $value["userID"];
					$isBlock = $value["userBlock"];
					$isBlock++;
					$query = "UPDATE tbl_user SET userBlock = '$isBlock' WHERE userID = '$userID' AND userEmail = '$userEmail'";
					$result = $this->db->update($query);

					$alert = "<span class='error'>username hoac mat khau khong hop le</span>";
					return $alert;
				} else {
					$alert = "<span class='error'>username hoac mat khau khong hop le</span>";
					return $alert;
				}
			}
		}
	}

	public function loginInMobile($userEmail, $password)
	{
		$query = "SELECT userID , userFullName , userEmail , userPhone , userImage, userStatus FROM tbl_user WHERE userEmail = '$userEmail' AND password = '$password'";
		$result = $this->db->select($query);

		if ($result) {
			return $result;
		}

		return false;
	}

	public function getUserInfo($userEmail)
	{
		$query = "SELECT userID , userFullName , userEmail , userPhone , userImage ,  userStatus  FROM tbl_user WHERE userEmail = '$userEmail'";
		$result = $this->db->select($query);

		if ($result) {
			return $result;
		}

		return false;
	}

	public function updateUser($data, $files)
	{
		$userFullName = mysqli_real_escape_string($this->db->link, $data["userFullName"]);
		$userPhone = mysqli_real_escape_string($this->db->link, $data["userPhone"]);
		$userStatus = mysqli_real_escape_string($this->db->link, $data["userStatus"]);

		if ($userFullName == "") {
			$alert = "<span class='error'>Bạn phải nhập đầy đủ các trường</span>";
			return $alert;
		} else {
			if (!isset($userPhone) || $userPhone === "") {
				$userPhone = "0380381234";
			}
			if (!isset($userStatus) || $userStatus === "") {
				$userStatus = "No infomation";
			}

			$permited = ['jpg', 'jpeg', 'png', 'gif'];
			$file_name = $files['userImage']['name'];
			$file_size = $files['userImage']['size'];
			$file_temp = $files['userImage']['tmp_name'];


			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
			$uploaded_image = "admin/uploads/avatars/" . $unique_image;

			if (empty($file_name) || $file_name === "") {
				$unique_image = "default.png";
			} else {
				move_uploaded_file($file_temp, $uploaded_image);
			}

			$userID = Session::get("userID");
			$query = "UPDATE tbl_user SET userFullName = '$userFullName' ,  userPhone = '$userPhone'  ,  userStatus = '$userStatus' , userImage = '$unique_image'  WHERE userID = '$userID'";
			$result = $this->db->update($query);

			if ($result) {
				Session::set("userFullName",  $userFullName);
				Session::set("userImage", $unique_image);
				$alert = '<p class="text-center mtb-10" style="font-weight: bold; color: red;">Cập nhập thông tin thành công</p>';
				return $alert;
			} else {
				$alert = '<p class="text-center mtb-10" style="font-weight: bold; color: red;" >Cập nhập thông tin không thành công</p>';
				return $alert;
			}
		}
	}

	public function updateInfoUser($datas)
	{
		$userFullName = mysqli_real_escape_string($this->db->link, $datas["name"]);
		$userPhone = mysqli_real_escape_string($this->db->link, $datas["phone"]);
		$userStatus = mysqli_real_escape_string($this->db->link, $datas["status"]);
		$userID = mysqli_real_escape_string($this->db->link, $datas["userID"]);

		$query = "UPDATE tbl_user SET userFullName = '$userFullName' , userPhone = '$userPhone' , userStatus = '$userStatus'  WHERE userID = '$userID' ";

		$result = $this->db->update($query);
		return $result;
	}

	public function getUserOnline()
	{
		$time = time();
		$query = "SELECT * FROM tbl_user WHERE userLastLogin > '$time'";
		$result = $this->db->select($query);
		return $result;
	}

	public function countUserOnline()
	{
		$time = time();
		$query = "SELECT count(userID) AS countUserOnline FROM tbl_user WHERE userLastLogin > '$time'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateStatus()
	{
		$userID = Session::get("userID");
		$lastLogin = time() + 10;
		$queryOnline = "UPDATE tbl_user SET userLastLogin = '$lastLogin' WHERE userID = '$userID'";
		$this->db->update($queryOnline);
	}

	public function emailExist($data)
	{
		$userEmail = mysqli_real_escape_string($this->db->link, $data["email"]);
		$query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail'";
		$result = $this->db->select($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function checkEmail($userEmail)
	{
		$userEmail = mysqli_real_escape_string($this->db->link, $userEmail);
		$query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail'";
		$result = $this->db->select($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function insertUserInMobile($data)
	{
		$userFullName = mysqli_real_escape_string($this->db->link, $data["name"]);
		$userEmail = mysqli_real_escape_string($this->db->link, $data["email"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);
		$password = md5($password);

		$userPhone = "12345678";
		$userStatus = "no infomation";
		$userCode =  "1";

		$query = "INSERT INTO tbl_user(password, userFullName, userEmail, userPhone, userImage, userStatus , userActive) VALUES('$password','$userFullName','$userEmail','$userPhone','default.png', '$userStatus' , '$userCode') ";
		$result = $this->db->insert($query);
		if ($result) {
			return true;
		}
		return false;
	}



	public function insertUser($data, $files)
	{
		$userFullName = mysqli_real_escape_string($this->db->link, $data["userFullName"]);
		$userPhone = mysqli_real_escape_string($this->db->link, $data["userPhone"]);
		$userEmail = mysqli_real_escape_string($this->db->link, $data["userEmail"]);
		$userStatus = mysqli_real_escape_string($this->db->link, $data["userStatus"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);
		$repassword = mysqli_real_escape_string($this->db->link, $data["repassword"]);

		$checkEmail = $this->checkEmail($userEmail);
		if ($checkEmail) {
			$alert = "<div class='error' style='text-align: center; color: red;'>Địa chỉ Email đã tồn tại</div>";
			return $alert;
		}

		if ($password !== $repassword) {
			$alert = "<div class='error' style='text-align: center; color: red;'>Mật khẩu không khớp, vui lòng kiểm tra lại 2 trường mật khẩu</div>";
			return $alert;
		} else {
			if (strlen($password) < 8) {
				$alert = "<div class='error' style='text-align: center; color: red;'>Mật khẩu quá ngắn</div>";
				return $alert;
			}
		}
		$password = md5($password);


		if ($userFullName == "" || $userEmail == "" ||  $password == "") {
			$alert = "<span class='error'>Bạn phải nhập đầy đủ các trường</span>";
			return $alert;
		} else {
			if (!isset($userPhone) || $userPhone === "") {
				$userPhone = "1234567890";
			}
			if (!isset($userStatus) || $userStatus === "") {
				$userStatus = "Chua cap nhap";
			}

			$permited = ['jpg', 'jpeg', 'png', 'gif'];
			$file_name = $files['userImage']['name'];
			$file_size = $files['userImage']['size'];
			$file_temp = $files['userImage']['tmp_name'];


			$div = explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
			$uploaded_image = "admin/uploads/avatars/" . $unique_image;

			if (empty($file_name) || $file_name === "") {
				$unique_image = "default.png";
			} else {
				move_uploaded_file($file_temp, $uploaded_image);
			}

			$userCode =  "MWStore:" . strval(md5(time())) . strval(md5($userEmail));
			$query = "INSERT INTO tbl_user(password, userFullName, userEmail, userPhone, userImage, userStatus , userActive) VALUES('$password','$userFullName','$userEmail','$userPhone', '$unique_image', '$userStatus' , '$userCode') ";
			$result = $this->db->insert($query);
			$sendEmail = $this->email->sendEmail($userEmail, $userCode);

			if ($result && $sendEmail) {
				Session::set("userEmail",  $userEmail);
				header("Location: confirmaccount.php");
			} else {
				$alert = '<div class="text-center text-noti-red">Thêm sản phẩm không thành công</div>';
				return $alert;
			}
		}
	}

	public function updatePassword($datas)
	{
		$userID = mysqli_real_escape_string($this->db->link, $datas["userID"]);
		$password = mysqli_real_escape_string($this->db->link, $datas["password"]);
		$password = md5($password);
		$newPassword = mysqli_real_escape_string($this->db->link, $datas["newPassword"]);

		$query = "SELECT * FROM tbl_user WHERE userID = '$userID' AND password = '$password' ";
		$result = $this->db->select($query);
		if ($result) {
			$newPassword = md5($newPassword);
			$query = "UPDATE tbl_user SET password = '$newPassword' WHERE userID = '$userID'";
			$result = $this->db->update($query);
			if ($result) {
				return true;
			}
			return false;
		}
		return false;
	}

	public function changePassword($data)
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$oldPassword = mysqli_real_escape_string($this->db->link, $data["oldPassword"]);
		$newPassword = mysqli_real_escape_string($this->db->link, $data["newPassword"]);
		$reNewPassword = mysqli_real_escape_string($this->db->link, $data["reNewPassword"]);

		$queryPassword = "SELECT * FROM tbl_user WHERE userID = '$userID'";
		$resutlPassword = $this->db->select($queryPassword)->fetch_assoc();
		$password = $resutlPassword["password"];

		if ($password != md5($oldPassword)) {
			$alert = '<div class="text-center text-noti-red">Sai mat khau</div>';
			return $alert;
		}

		if ($oldPassword == "" || $newPassword == "" || $reNewPassword == "") {
			$alert = '<div class="text-center text-noti-red">Ban phai nhap day du cac truong</div>';
			return $alert;
		} elseif ($newPassword != $reNewPassword) {
			$alert = '<div class="text-center text-noti-red">Hai mat khau khong khop</div>';
			return $alert;
		} else {
			$password = md5($newPassword);
			$queryUpdate = "UPDATE tbl_user SET password = '$password' WHERE userID = '$userID'";
			$resultUpdate = $this->db->update($queryUpdate);

			if ($resultUpdate) {
				header("Location: cart.php");
			} else {
				$alert = '<div class="text-center text-noti-red">Cap nhap mat khau khong thanh cong</div>';
				return $alert;
			}
		}
	}

	public function getCustomer($ID)
	{
		$query = "SELECT * FROM tbl_user WHERE userID = '$ID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function blockUser($userID)
	{
		$query = "UPDATE tbl_user SET userBlock = 6 WHERE userID = '$userID'";
		$result = $this->db->update($query);

		if ($result) {
			Session::set("blockUserSuccess", 0);
		}

		return $result;
	}

	public function unBlockUser($userID)
	{
		$query = "UPDATE tbl_user SET userBlock = 0 WHERE userID = '$userID'";
		$result = $this->db->update($query);

		unset($_SESSION["userBlock"]);

		if ($result) {
			Session::set("unBlockUserSuccess", 0);
		}

		return $result;
	}

	public function isBlockUser()
	{
		$userID = Session::get("userID");
		$query = "SELECT *  FROM tbl_user WHERE userID = '$userID'";
		$result = $this->db->select($query)->fetch_assoc();

		$userBlock = $result["userBlock"];
		$userID = $result["userID"];
		$userFullName = $result["userFullName"];

		if ($userBlock >= 5) {

			Session::set("userBlock", true);
			Session::set("userLogin", false);
			Session::set("userID", $userID);
			Session::set("userFullName", $userFullName);

			return true;
		}
	}

	function activeUser($userEmail)
	{
		$query = "UPDATE tbl_user SET userActive = 1 WHERE userEmail = '$userEmail'";
		$result = $this->db->update($query);

		if ($result) {
			$query = "SELECT * FROM tbl_user  WHERE userEmail = '$userEmail'";
			$result = $this->db->select($query);
			$value = $result->fetch_assoc();

			Session::set("userBlock", false);
			Session::set("userLogin", true);
			Session::set("loginToast", 0);
			Session::set("userID",  $value["userID"]);
			Session::set("userFullName",  $value["userFullName"]);
			Session::set("userImage",  $value["userImage"]);
			unset($_SESSION["userCode"]);

			$userID =  $value["userID"];
			$lastLogin = time() + 10;
			$query = "UPDATE tbl_user SET userLastLogin = '$lastLogin' WHERE userID = '$userID'";
			$this->db->update($query);

			header("Location: index.php");
		}
	}

	public function deleteUser($userID)
	{
		$query = "DELETE FROM tbl_user WHERE userID = '$userID'";
		$result = $this->db->delete($query);
		if ($result) {
			header("Location: userlist.php");
		} else {
			return false;
		}
	}
}
