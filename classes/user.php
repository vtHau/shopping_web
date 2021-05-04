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

	public function getAllUser()
	{
		$query = "SELECT * FROM tbl_user";
		$result = $this->db->select($query);

		return $result;
	}



	public function loginCustomer($data)
	{
		$username = mysqli_real_escape_string($this->db->link, $data["username"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);

		if ($username == "" || $password == "") {
			$alert = "<span class='error'>Vui long hoan thanh cac truong</span>";
			return $alert;
		} else {
			$password = md5($password);
			$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
			$result = $this->db->select($query);

			if ($result) {
				$value = $result->fetch_assoc();
				$isBlock = $value["userBlock"];
				$userEmail = $value["userEmail"];
				$userCode = $value["userActive"];
				$userPhone = $value["userPhone"];
				$username = $value["username"];

				if ($isBlock < 5) {
					if ($value["userActive"] != 1) {
						Session::set("userCode", $value["userActive"]);
						$userCode =  "HTStore:" . strval(md5(time())) . strval(md5($username)) . strval(md5($userEmail)) . strval(md5($userPhone));
						$sendEmail = $this->email->sendEmail($username, $userEmail, $userCode);
						if ($sendEmail) {
							header("Location: reconfirm.php");
						}
					} else {
						Session::set("userBlock", false);
						Session::set("userLogin", true);
						Session::set("loginToast", 0);
						Session::set("userID",  $value["userID"]);
						Session::set("username",  $value["username"]);
						Session::set("userFullName",  $value["userFullName"]);
						Session::set("userImage",  $value["userImage"]);
						unset($_SESSION["userCode"]);
						$userID =  $value["userID"];
						$lastLogin = time() + 10;
						$query = "UPDATE tbl_user SET userLastLogin = '$lastLogin' WHERE userID = '$userID'";
						$this->db->update($query);

						header("Location: index.php");
					}
				} else {
					Session::set("userBlock", true);
					Session::set("userID",  $value["userID"]);
					Session::set("userFullName",  $value["userFullName"]);
					header("Location: userblock.php");
				}
			} else {
				$query = "SELECT * FROM tbl_user WHERE username = '$username'";
				$result = $this->db->select($query);

				if ($result) {
					$value = $result->fetch_assoc();
					$userID = $value["userID"];
					$isBlock = $value["userBlock"];
					$isBlock++;
					$query = "UPDATE tbl_user SET userBlock = '$isBlock' WHERE userID = '$userID' AND username = '$username'";
					$result = $this->db->update($query);
					// header("Location: index.php");

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
		$query = "SELECT userID , userFullName , userEmail , userPhone , userAddress , userImage , userSex , userStatus , userBirthDay   FROM tbl_user WHERE userEmail = '$userEmail' AND password = '$password'";
		$result = $this->db->select($query);

		if ($result) {
			return $result;
		}

		return false;
	}

	public function getUserInfo($userEmail)
	{
		$query = "SELECT userID , userFullName , userEmail , userPhone , userAddress , userImage , userSex , userStatus , userBirthDay   FROM tbl_user WHERE userEmail = '$userEmail'";
		$result = $this->db->select($query);

		if ($result) {
			return $result;
		}

		return false;
	}

	public function updateInfoUser($datas)
	{
		$userFullName = mysqli_real_escape_string($this->db->link, $datas["name"]);
		$userPhone = mysqli_real_escape_string($this->db->link, $datas["phone"]);
		$userAddress = mysqli_real_escape_string($this->db->link, $datas["address"]);
		$userStatus = mysqli_real_escape_string($this->db->link, $datas["status"]);
		$userID = mysqli_real_escape_string($this->db->link, $datas["userID"]);

		$query = "UPDATE tbl_user SET userFullName = '$userFullName' , userPhone = '$userPhone' , userStatus = '$userStatus' , userAddress = '$userAddress' WHERE userID = '$userID' ";

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

	public function insertUserInMobile($data)
	{
		$userFullName = mysqli_real_escape_string($this->db->link, $data["name"]);
		$userEmail = mysqli_real_escape_string($this->db->link, $data["email"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);
		$password = md5($password);

		$userPhone = "12345678";
		$username = strval(md5(time()));
		$userBirthDay = "2001-01-01";
		$userSex = 1;
		$userAddress	= "no infomation";
		$userStatus = "no infomation";

		$userCode =  "1";
		$query = "INSERT INTO tbl_user(username, password, userFullName, userEmail, userPhone, userBirthDay, userSex, userAddress, userImage, userStatus , userActive) VALUES('$username','$password','$userFullName','$userEmail','$userPhone', '$userBirthDay', '$userSex', '$userAddress','default.png', '$userStatus' , '$userCode') ";
		$result = $this->db->insert($query);
		if ($result) {
			return true;
		}
		return false;
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

	public function insertUser($data, $files)
	{
		$userFullName = mysqli_real_escape_string($this->db->link, $data["userFullName"]);
		$username = mysqli_real_escape_string($this->db->link, $data["username"]);
		$userSex = mysqli_real_escape_string($this->db->link, $data["userSex"]);
		$userBirthDay = mysqli_real_escape_string($this->db->link, $data["userBirthDay"]);
		$userPhone = mysqli_real_escape_string($this->db->link, $data["userPhone"]);
		$userEmail = mysqli_real_escape_string($this->db->link, $data["userEmail"]);
		$userAddress = mysqli_real_escape_string($this->db->link, $data["userAddress"]);
		$userStatus = mysqli_real_escape_string($this->db->link, $data["userStatus"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);
		$password = md5($password);

		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $files['userImage']['name'];
		$file_size = $files['userImage']['size'];
		$file_temp = $files['userImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/avatars/" . $unique_image;

		if ($userFullName == "" || $username == "" || $userSex == "" || $userBirthDay == "" || $userPhone == "" || $userEmail == "" || $userAddress == "" || $userStatus == "" ||  $password == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			if (empty($file_name)) {
				$unique_image = "default.png";
			} else {
				move_uploaded_file($file_temp, $uploaded_image);
			}

			$userCode =  "HTStore:" . strval(md5(time())) . strval(md5($username)) . strval(md5($userEmail)) . strval(md5($userPhone));
			$query = "INSERT INTO tbl_user(username, password, userFullName, userEmail, userPhone, userBirthDay, userSex, userAddress, userImage, userStatus , userActive) VALUES('$username','$password','$userFullName','$userEmail','$userPhone', '$userBirthDay', '$userSex', '$userAddress','$unique_image', '$userStatus' , '$userCode') ";
			$result = $this->db->insert($query);
			$sendEmail = $this->email->sendEmail($username, $userEmail, $userCode);

			if ($result && $sendEmail) {
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

	function activeUser($username)
	{
		$query = "UPDATE tbl_user SET userActive = 1 WHERE username = '$username'";
		$result = $this->db->update($query);

		if ($result) {
			$query = "SELECT * FROM tbl_user  WHERE username = '$username'";
			$result = $this->db->select($query);
			$value = $result->fetch_assoc();

			Session::set("userBlock", false);
			Session::set("userLogin", true);
			Session::set("loginToast", 0);
			Session::set("userID",  $value["userID"]);
			Session::set("username",  $value["username"]);
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
}
