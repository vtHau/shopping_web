<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class category
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getCategory()
	{
		$query = "SELECT * FROM tbl_category ORDER BY catID DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCategoryLimit($limit)
	{
		$query = "SELECT * FROM tbl_category ORDER BY catID DESC LIMIT $limit ";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCategoryByID($ID)
	{
		$query = "SELECT * FROM tbl_category WHERE catID = '$ID' ORDER BY catID DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function countCategory()
	{
		$query = "SELECT COUNT(catID) AS countCategory FROM tbl_category ";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	public function insertCategory($data, $files)
	{
		$catName = mysqli_real_escape_string($this->db->link, $data["catName"]);
		$catDescription = mysqli_real_escape_string($this->db->link, $data["catDescription"]);

		$permited = ['jpg', 'jpeg', 'png', 'gif'];
		$file_name = $files['catImage']['name'];
		$file_size = $files['catImage']['size'];
		$file_temp = $files['catImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/categorys/" . $unique_image;

		if ($catName == '' || $catDescription == "" || $file_name == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);

			$query = "INSERT INTO tbl_category(catName ,catDescription, catImage) VALUES('$catName','$catDescription', '$unique_image') ";
			$result = $this->db->insert($query);

			if ($result) {
				header("Location: categorylist.php");
			} else {
				$alert = '<div class="text-center text-noti-red">Thêm danh mục không thành công</div>';
				return $alert;
			}
		}
	}

	public function updateCategory($ID, $data, $files)
	{
		$catName = mysqli_real_escape_string($this->db->link, $data["catName"]);
		$catDescription = mysqli_real_escape_string($this->db->link, $data["catDescription"]);

		$permited = ['jpg', 'jpeg', 'png', 'gif'];
		$file_name = $files['catImage']['name'];
		$file_size = $files['catImage']['size'];
		$file_temp = $files['catImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/categorys/" . $unique_image;

		if ($catName == '' || $catDescription == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} elseif (!empty($file_name)) {
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "UPDATE tbl_category SET catName = '$catName' , catDescription = '$catDescription' , catImage = '$unique_image' WHERE catID = '$ID' ";
		} else {
			$query = "UPDATE tbl_category SET catName = '$catName' , catDescription = '$catDescription'  WHERE catID = '$ID' ";
		}

		$result = $this->db->update($query);

		if ($result) {
			header("Location: categorylist.php");
		} else {
			$alert = '<div class="text-center text-noti-red">Cập nhập danh mục không thành công</div>';
			return $alert;
		}
	}

	public function deleteCategory($ID)
	{
		$query = "DELETE FROM tbl_category WHERE catID = '$ID'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Category Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Category Deleted Not Success</span>";
			return $alert;
		}
	}
}
?>