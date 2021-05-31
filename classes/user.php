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
		$this->db = Database::getInstance();
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
		$userID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
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

	public function getUserNotConfirm()
	{
		$query = "SELECT userID ,  userFullName , userImage , userPhone , userEmail , userStatus FROM tbl_user WHERE userActive <> 1 ";
		$result = $this->db->select($query);
		if ($result) {
			return $result;
		}
		return false;
	}

	public function getAllUser()
	{
		$query = "SELECT * FROM tbl_user";
		$result = $this->db->select($query);

		return $result;
	}



	public function signInUser($userEmail, $password)
	{
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userEmail));
		$password =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $password));

		if ($userEmail == "" || $password == "") {
			return "INPUT_FILL";
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
							return "RECONFIRM";
						}
					} else {
						Session::set("userBlock", false);
						Session::set("userLogin", true);
						Session::set("userID",  $value["userID"]);
						Session::set("userEmail",  $value["userEmail"]);
						Session::set("userFullName",  $value["userFullName"]);
						Session::set("userImage",  $value["userImage"]);
						unset($_SESSION["userCode"]);
						$userID =  $value["userID"];
						$lastLogin = time() + 10;
						$query = "UPDATE tbl_user SET userLastLogin = '$lastLogin' WHERE userID = '$userID'";
						$this->db->update($query);
						if (Session::get("userLogin") === true) {
							return "SIGN_SUCCESS";
						}
					}
				} else {
					Session::set("userBlock", true);
					Session::set("userID",  $value["userID"]);
					Session::set("userFullName",  $value["userFullName"]);
					return "USER_BLOCK";
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
					return "SIGN_FAIL";
				} else {
					return "SIGN_FAIL";
				}
			}
		}
	}

	public function loginInMobile($userEmail, $password)
	{
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userEmail));
		$password =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $password));

		$query = "SELECT userID , userFullName , userEmail , userPhone , userImage, userStatus FROM tbl_user WHERE userEmail = '$userEmail' AND password = '$password'";
		$result = $this->db->select($query);

		if ($result) {
			return $result;
		}

		return false;
	}

	public function getUserInfo($userEmail)
	{
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userEmail));
		$query = "SELECT userID , userFullName , userEmail , userPhone , userImage ,  userStatus  FROM tbl_user WHERE userEmail = '$userEmail'";
		$result = $this->db->select($query);

		if ($result) {
			return $result;
		}

		return false;
	}

	public function updateUser($data, $files)
	{
		$userFullName = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["userFullName"]));
		$userPhone = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["userPhone"]));
		$userStatus = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["userStatus"]));

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
			} elseif (!in_array($file_ext, $permited)) {
				$alert = '<div class="text-center text-noti-red">File khong hop le</div>';
				return $alert;
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
		$userFullName = $this->fm->validation(mysqli_real_escape_string($this->db->link, $datas["name"]));
		$userPhone = $this->fm->validation(mysqli_real_escape_string($this->db->link, $datas["phone"]));
		$userStatus = $this->fm->validation(mysqli_real_escape_string($this->db->link, $datas["status"]));
		$userID = $this->fm->validation($this->db->link, $datas["userID"]);

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
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["email"]));
		$query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail'";
		$result = $this->db->select($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function checkEmail($userEmail)
	{
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userEmail));
		$query = "SELECT * FROM tbl_user WHERE userEmail = '$userEmail'";
		$result = $this->db->select($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function insertUserInMobile($data)
	{
		$userFullName = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["name"]));
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["email"]));
		$password = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["password"]));
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
		$userFullName = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["userFullName"]));
		$userPhone = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["userPhone"]));
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["userEmail"]));
		$userStatus = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["userStatus"]));
		$password = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["password"]));
		$repassword = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data["repassword"]));

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
			} elseif (!in_array($file_ext, $permited)) {
				$alert = '<div class="text-center text-noti-red">File khong hop le</div>';
				return $alert;
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
				$alert = '<div class="text-center text-noti-red">Thất bại</div>';
				return $alert;
			}
		}
	}

	public function updatePassword($datas)
	{
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $datas["userID"]));
		$password = $this->fm->validation(mysqli_real_escape_string($this->db->link, $datas["password"]));
		$newPassword = $this->fm->validation(mysqli_real_escape_string($this->db->link, $datas["newPassword"]));
		$password = md5($password);

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

	public function changePassword($oldPassword, $newPassword)
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$oldPassword = $this->fm->validation(mysqli_real_escape_string($this->db->link, $oldPassword));
		$newPassword = $this->fm->validation(mysqli_real_escape_string($this->db->link, $newPassword));

		$queryPassword = "SELECT * FROM tbl_user WHERE userID = '$userID'";
		$resutlPassword = $this->db->select($queryPassword)->fetch_assoc();
		$password = $resutlPassword["password"];

		if ($password !== md5($oldPassword)) {
			$alert = 'PASSWORD_WRONG';
			return $alert;
		}

		if ($oldPassword == "" || $newPassword == "") {
			$alert = 'INPUT_FILL';
			return $alert;
		} else {
			$password = md5($newPassword);
			$queryUpdate = "UPDATE tbl_user SET password = '$password' WHERE userID = '$userID'";
			$resultUpdate = $this->db->update($queryUpdate);

			if ($resultUpdate) {
				$alert = 'CHANGE_PASSWORD_SUCCESS';
				return $alert;
			} else {
				$alert = 'CHANGE_PASSWORD_FAIL';
				return $alert;
			}
		}
	}

	public function getCustomer($ID)
	{
		$ID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $ID));
		$query = "SELECT * FROM tbl_user WHERE userID = '$ID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function blockUser($userID)
	{
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
		$query = "UPDATE tbl_user SET userBlock = 6 WHERE userID = '$userID'";
		$result = $this->db->update($query);

		if ($result) {
			Session::set("blockUserSuccess", 0);
		}

		return $result;
	}

	public function unBlockUser($userID)
	{
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
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
		$userEmail = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userEmail));
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
			Session::set("userEmail",  $value["userEmail"]);
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
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));

		$queryImg = "SELECT userImage FROM tbl_user WHERE userID = '$userID'";
		$userImage = $this->db->select($queryImg)->fetch_assoc()["sliderImage"];
		if ($userImage !== "default.png") {
			$deleteAvatar = unlink("admin/uploads/avatars/" . $userImage);
		}

		$query = "DELETE FROM tbl_user WHERE userID = '$userID'";
		$result = $this->db->delete($query);

		if ($result) {
			return "DEL_SUCCESS";
		} else {
			return "DEL_FAIL";
		}
	}

	public function deleteUserExtension($userID)
	{

		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));

		$queryImg = "SELECT userImage FROM tbl_user WHERE userID = '$userID'";
		$userImage = $this->db->select($queryImg)->fetch_assoc()["sliderImage"];
		if ($userImage !== "default.png") {
			$deleteAvatar = unlink("admin/uploads/avatars/" . $userImage);
		}

		$query = "DELETE FROM tbl_user WHERE userID = '$userID'";
		$result = $this->db->delete($query);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function activeUserExtension($userID)
	{
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
		$query = "UPDATE tbl_user SET userActive = 1 WHERE userID = '$userID'";
		$result = $this->db->update($query);
		if ($result) {
			return true;
		}
		return false;
	}
}
