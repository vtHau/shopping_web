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
		$query = "SELECT * FROM tbl_customer";
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
			$check = "SELECT * FROM tbl_customer WHERE username = '$username' AND password = '$password'";
			$resultCheck = $this->db->select($check);

			if ($resultCheck) {
				$value = $resultCheck->fetch_assoc();
				Session::set("userLogin", true);
				Session::set("showToast", 0);
				Session::set("userID",  $value["userID"]);
				Session::set("username",  $value["username"]);
				Session::set("userFullName",  $value["userFullName"]);
				Session::set("userImage",  $value["userImage"]);
				header("Location: index.php");
			} else {
				$alert = "<span class='error'>username hoac mat khau khong hop le</span>";
				return $alert;
			}
		}
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

			$query = "INSERT INTO tbl_customer(username, password, userFullName, userEmail, userPhone, userBirthDay, userSex, userAddress, userImage, userStatus) VALUES('$username','$password','$userFullName','$userEmail','$userPhone', '$userBirthDay', '$userSex', '$userAddress','$unique_image', '$userStatus') ";
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

		$queryPassword = "SELECT * FROM tbl_customer WHERE userID = '$userID'";
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
			$queryUpdate = "UPDATE tbl_customer SET password = '$password' WHERE userID = '$userID'";
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
		$query = "SELECT * FROM tbl_customer WHERE userID = '$ID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateCustomer($data, $ID)
	{
		$name = mysqli_real_escape_string($this->db->link, $data["name"]);
		// $city = mysqli_real_escape_string($this->db->link, $data["city"]);
		$zipcode = mysqli_real_escape_string($this->db->link, $data["zipcode"]);
		$username = mysqli_real_escape_string($this->db->link, $data["username"]);
		$address = mysqli_real_escape_string($this->db->link, $data["address"]);
		$phone = mysqli_real_escape_string($this->db->link, $data["phone"]);
		// $password = mysqli_real_escape_string($this->db->link, $data["password"]);
		// $password = md5($password);

		if ($name == ''  || $zipcode == "" || $username == "" || $address == "" || $phone == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			$query = "UPDATE tbl_customer SET name = '$name', address = '$address', zipcode = '$zipcode', phone = '$phone', username = '$username'";
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<span class='error'>Cap nhap thong tin thanh cong</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Cap nhap thong tin khong thanh cong</span>";
				return $alert;
			}
		}
	}
}
