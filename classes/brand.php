<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class brand
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getBrand()
	{
		$query = "SELECT * FROM tbl_brand ORDER BY brandID DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getBrandByID($ID)
	{
		$query = "SELECT * FROM tbl_brand WHERE brandID = '$ID' ORDER BY brandID DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function countBrand()
	{
		$query = "SELECT COUNT(brandID) AS countBrand FROM tbl_brand ";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	public function insertBrand($data, $files)
	{
		$brandName = mysqli_real_escape_string($this->db->link, $data["brandName"]);
		$brandDescription = mysqli_real_escape_string($this->db->link, $data["brandDescription"]);

		$permited = ['jpg', 'jpeg', 'png', 'gif'];
		$file_name = $files['brandImage']['name'];
		$file_size = $files['brandImage']['size'];
		$file_temp = $files['brandImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/brands/" . $unique_image;

		if ($brandName == '' || $brandDescription == "" || $file_name == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);

			$query = "INSERT INTO tbl_brand(brandName ,brandDescription, brandImage) VALUES('$brandName','$brandDescription', '$unique_image') ";
			$result = $this->db->insert($query);

			if ($result) {
				header("Location: brandlist.php");
			} else {
				$alert = '<div class="text-center text-noti-red">Thêm thương hiệu không thành công</div>';
				return $alert;
			}
		}
	}

	public function updateBrand($ID, $data, $files)
	{
		$brandName = mysqli_real_escape_string($this->db->link, $data["brandName"]);
		$brandDescription = mysqli_real_escape_string($this->db->link, $data["brandDescription"]);

		$permited = ['jpg', 'jpeg', 'png', 'gif'];
		$file_name = $files['brandImage']['name'];
		$file_size = $files['brandImage']['size'];
		$file_temp = $files['brandImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/brands/" . $unique_image;

		if ($brandName == '' || $brandDescription == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} elseif (!empty($file_name)) {
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "UPDATE tbl_brand SET brandName = '$brandName' , brandDescription = '$brandDescription' , brandImage = '$unique_image' WHERE brandID = '$ID' ";
		} else {
			$query = "UPDATE tbl_brand SET brandName = '$brandName' , brandDescription = '$brandDescription'  WHERE brandID = '$ID' ";
		}

		$result = $this->db->update($query);

		if ($result) {
			header("Location: brandlist.php");
		} else {
			$alert = '<div class="text-center text-noti-red">Cập nhập thương hiệu không thành công</div>';
			return $alert;
		}
	}
	public function deleteBrand($ID)
	{
		$query = "DELETE FROM tbl_brand WHERE brandID = '$ID'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Brand Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Brand Deleted Not Success</span>";
			return $alert;
		}
	}
}
?>