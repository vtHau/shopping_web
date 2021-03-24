<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class slider
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getSlider()
	{
		$query = "SELECT * FROM tbl_slider";
		$result = $this->db->select($query);
		return $result;
	}

	public function getSliderInUser()
	{
		$query = "SELECT * FROM tbl_slider WHERE sliderType = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getSliderByID($ID)
	{
		$query = "SELECT * FROM tbl_slider WHERE sliderID = '$ID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertSlider($data, $files)
	{
		$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
		$productID = mysqli_real_escape_string($this->db->link, $data['productID']);
		$sliderType = mysqli_real_escape_string($this->db->link, $data['sliderType']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $files['sliderImage']['name'];
		$file_size = $files['sliderImage']['size'];
		$file_temp = $files['sliderImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/sliders/" . $unique_image;

		if ($sliderName == "" || $productID == "" || $sliderType == "" || $file_name == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);

			$query = "INSERT INTO tbl_slider(productID, sliderName, sliderType, sliderImage) VALUES('$productID', '$sliderName', '$sliderType', '$unique_image') ";
			$result = $this->db->insert($query);
			if ($result) {
				// header("Location: productlist.php");
				return true;
			} else {
				$alert = '<div class="text-center text-noti-red">Thêm sản phẩm không thành công</div>';
				return $alert;
			}
		}
	}

	public function updateSlider($ID, $data, $files)
	{
		$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
		$productID = mysqli_real_escape_string($this->db->link, $data['productID']);
		$sliderType = mysqli_real_escape_string($this->db->link, $data['sliderType']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $files['sliderImage']['name'];
		$file_size = $files['sliderImage']['size'];
		$file_temp = $files['sliderImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/sliders/" . $unique_image;

		if ($productID == "" || $sliderName == "" || $sliderType == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "UPDATE tbl_slider SET
									productID = '$productID',
									sliderName = '$sliderName',
									sliderType = '$sliderType',
									sliderImage = '$unique_image'
									WHERE sliderID = '$ID'";
			} else {
				$query = "UPDATE tbl_slider SET
				productID = '$productID',
				sliderName = '$sliderName',
				sliderType = '$sliderType'
				WHERE sliderID = '$ID'";
			}
			echo "<script>console.log('$query')</script>";
			$result = $this->db->update($query);
			if ($result) {
				header("Location: sliderlist.php");
			} else {
				echo "<script>console.log('da sai')</script>";
				$alert = '<div class="text-center text-noti-red">Cập nhập sản phẩm không thành công</div>';

				return $alert;
			}
		}
	}

	public function deleteSlider($sliderID)
	{
		$query = "DELETE FROM tbl_slider WHERE sliderID = '$sliderID'";
		$result = $this->db->delete($query);

		if ($result) {
			header("Location: sliderlist.php");
		}

		return false;
	}
}
?>