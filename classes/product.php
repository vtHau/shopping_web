<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class product
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getProduct()
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 ORDER BY tbl_product.productID DESC ";

		$result = $this->db->select($query);
		return $result;
	}

	public function getProductByBrand($brandID)
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 WHERE productBrand = '$brandID'
			 ORDER BY tbl_product.productID DESC ";

		$result = $this->db->select($query);
		return $result;
	}

	public function getProductByCategory($catID)
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 WHERE productCategory = '$catID'
			 ORDER BY tbl_product.productID DESC ";

		$result = $this->db->select($query);
		return $result;
	}

	public function getProductFeather()
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 WHERE productFeather = 1 
			 ORDER BY tbl_product.productID DESC ";

		$result = $this->db->select($query);
		return $result;
	}

	public function getProductSell()
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 WHERE productSell = 1 
			 ORDER BY tbl_product.productID DESC ";

		$result = $this->db->select($query);
		return $result;
	}

	public function getProductHotDeal()
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 WHERE productHotDeal = 1 
			 ORDER BY tbl_product.productID DESC ";

		$result = $this->db->select($query);
		return $result;
	}

	public function searchProduct($keyword)
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 WHERE tbl_product.productName LIKE '%$keyword%' 
			 ORDER BY tbl_product.productID DESC";

		$result = $this->db->select($query);
		return $result;
	}

	public function getProductLimit()
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
			 ORDER BY tbl_product.productID DESC LIMIT 20";

		$result = $this->db->select($query);
		return $result;
	}

	public function getProductByID($ID)
	{
		$query =
			"SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
		 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
		 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID
		 WHERE productID = '$ID'";

		$result = $this->db->select($query);
		return $result;
	}

	public function countProduct()
	{
		$query = "SELECT COUNT(productID) AS countProduct FROM tbl_product ";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	public function insertProduct($data, $files)
	{
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$productCategory = mysqli_real_escape_string($this->db->link, $data['productCategory']);
		$productBrand = mysqli_real_escape_string($this->db->link, $data['productBrand']);
		$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
		$productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
		$productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
		$productFeather = mysqli_real_escape_string($this->db->link, $data['productFeather']);
		$productSell = mysqli_real_escape_string($this->db->link, $data['productSell']);
		$productHotDeal = mysqli_real_escape_string($this->db->link, $data['productHotDeal']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $files['productImage']['name'];
		$file_size = $files['productImage']['size'];
		$file_temp = $files['productImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/products/" . $unique_image;

		if ($productName == "" || $productCategory == "" || $productBrand == "" || $productQuantity == "" || $productDesc == "" || $productPrice == "" || $productFeather == "" || $productSell == "" || $productHotDeal == "" || $file_name == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			move_uploaded_file($file_temp, $uploaded_image);

			$query = "INSERT INTO tbl_product(productName, productCategory, productBrand, productQuantity, productDesc, productPrice, productFeather, productSell, productHotDeal, productImage) VALUES('$productName','$productCategory','$productBrand', '$productQuantity','$productDesc','$productPrice','$productFeather', '$productSell', '$productHotDeal','$unique_image') ";
			$result = $this->db->insert($query);
			if ($result) {
				header("Location: productlist.php");
			} else {
				$alert = '<div class="text-center text-noti-red">Thêm sản phẩm không thành công</div>';
				return $alert;
			}
		}
	}

	public function updateViewProduct($productID)
	{
		$query = "UPDATE tbl_product SET productView = productView + 1 WHERE productID = '$productID'";
		$result = $this->db->update($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function updateProduct($ID, $data, $files)
	{
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$productCategory = mysqli_real_escape_string($this->db->link, $data['productCategory']);
		$productBrand = mysqli_real_escape_string($this->db->link, $data['productBrand']);
		$productQuantity = mysqli_real_escape_string($this->db->link, $data['productQuantity']);
		$productDesc = mysqli_real_escape_string($this->db->link, $data['productDesc']);
		$productPrice = mysqli_real_escape_string($this->db->link, $data['productPrice']);
		$productFeather = mysqli_real_escape_string($this->db->link, $data['productFeather']);
		$productSell = mysqli_real_escape_string($this->db->link, $data['productSell']);
		$productHotDeal = mysqli_real_escape_string($this->db->link, $data['productHotDeal']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $files['productImage']['name'];
		$file_size = $files['productImage']['size'];
		$file_temp = $files['productImage']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
		$uploaded_image = "../admin/uploads/products/" . $unique_image;

		if ($productName == "" || $productCategory == "" || $productBrand == "" || $productQuantity == "" || $productDesc == "" || $productPrice == "" || $productFeather == "" || $productSell == "" || $productHotDeal == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			if (!empty($file_name)) {
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "UPDATE tbl_product SET
									productName = '$productName',
									productCategory = '$productCategory',
									productBrand = '$productBrand',
									productQuantity = '$productQuantity',
									productDesc = '$productDesc',
									productPrice = '$productPrice', 
									productFeather = '$productFeather', 
									productSell = '$productSell', 
									productHotDeal = '$productHotDeal', 
									productImage = '$unique_image'
									WHERE productID = '$ID'";
			} else {
				$query = "UPDATE tbl_product SET
									productName = '$productName',
									productCategory = '$productCategory',
									productBrand = '$productBrand',
									productQuantity = '$productQuantity',
									productDesc = '$productDesc',
									productPrice = '$productPrice', 
									productFeather = '$productFeather', 
									productSell = '$productSell', 
									productHotDeal = '$productHotDeal'
									WHERE productID = '$ID'";
			}

			$result = $this->db->update($query);
			if ($result) {
				header("Location: productlist.php");
			} else {
				$alert = '<div class="text-center text-noti-red">Cập nhập sản phẩm không thành công</div>';
				return $alert;
			}
		}
	}

	public function deleteProduct($ID)
	{
		$query = "DELETE FROM tbl_product WHERE productID = '$ID' ";
		$result = $this->db->delete($query);
		if ($result) {
			header("Location: productlist.php");
		} else {
			$alert = '<div class="text-center text-noti-red">Xóa sản phẩm không thành công</div>';
			return $alert;
		}
	}
}
?>