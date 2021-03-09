<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class user
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getUserID()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}
		return $userID;
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

				if ($isBlock < 5) {
					Session::set("userBlock", false);
					Session::set("userLogin", true);
					Session::set("loginToast", 0);
					Session::set("userID",  $value["userID"]);
					Session::set("username",  $value["username"]);
					Session::set("userFullName",  $value["userFullName"]);
					Session::set("userImage",  $value["userImage"]);

					$userID =  $value["userID"];
					$lastLogin = time() + 10;
					$query = "UPDATE tbl_user SET userLastLogin = '$lastLogin' WHERE userID = '$userID'";
					$this->db->update($query);

					header("Location: index.php");
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

	public function getUserOnline()
	{
		$time = time();
		$query = "SELECT * FROM tbl_user WHERE userLastLogin > '$time'";
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

			$query = "INSERT INTO tbl_user(username, password, userFullName, userEmail, userPhone, userBirthDay, userSex, userAddress, userImage, userStatus) VALUES('$username','$password','$userFullName','$userEmail','$userPhone', '$userBirthDay', '$userSex', '$userAddress','$unique_image', '$userStatus') ";
			echo "<script>console.log('$query')</script>";
			$result = $this->db->insert($query);

			if ($result) {
				header("Location: index.php");
				echo "<script>console.log('them tai khaon tanh cong')</script>";
			} else {
				echo "<script>console.log('them tai khaon that bai')</script>";
				$alert = '<div class="text-center text-noti-red">Thêm sản phẩm không thành công</div>';
				return $alert;
			}
		}
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
}
