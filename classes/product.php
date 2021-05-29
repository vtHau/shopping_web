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
		$brandID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $brandID));
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
		$catID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $catID));
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
		$keyword = $this->fm->validation(mysqli_real_escape_string($this->db->link, $keyword));
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
		$ID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $ID));
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
		$productName = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productName']));
		$productCategory = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productCategory']));
		$productBrand = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productBrand']));
		$productQuantity = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productQuantity']));
		$productDesc = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productDesc']));
		$productPrice = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productPrice']));
		$productFeather = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productFeather']));
		$productSell = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productSell']));
		$productHotDeal = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productHotDeal']));

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
				$alert = '<div class="text-center text-noti-red">Thất bại</div>';
				return $alert;
			}
		}
	}

	public function insertProductCrawl($productBrand, $productName, $productPrice, $productDesc, $src)
	{
		$$productBrand = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productBrand));
		$productName = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productName));
		$productPrice = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productPrice));
		$productDesc = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productDesc));
		$src = $this->fm->validation(mysqli_real_escape_string($this->db->link, $src));

		$productCategory = 10;
		$productQuantity = 100;
		$productFeather = 1;
		$productSell = 1;
		$productHotDeal = 1;

		$unique_image = basename($src);
		$uploaded_image = '../admin/uploads/products/' . $unique_image;
		file_put_contents($uploaded_image, file_get_contents($src));

		if ($productName == "" || $productCategory == "" || $productBrand == "" || $productQuantity == "" || $productDesc == "" || $productPrice == "" || $productFeather == "" || $productSell == "" || $productHotDeal == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			$query = "INSERT INTO tbl_product(productName, productCategory, productBrand, productQuantity, productDesc, productPrice, productFeather, productSell, productHotDeal, productImage) VALUES('$productName','$productCategory','$productBrand', '$productQuantity','$productDesc','$productPrice','$productFeather', '$productSell', '$productHotDeal','$unique_image') ";
			$result = $this->db->insert($query);
			if ($result) {
				return "ADD_SUCCESS";
			} else {
				return "ADD_FAIL";
			}
		}
	}

	public function updateViewProduct($productID)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$query = "UPDATE tbl_product SET productView = productView + 1 WHERE productID = '$productID'";
		$result = $this->db->update($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function updateProduct($ID, $data, $files)
	{
		$productName = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productName']));
		$productCategory = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productCategory']));
		$productBrand = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productBrand']));
		$productQuantity = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productQuantity']));
		$productDesc = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productDesc']));
		$productPrice = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productPrice']));
		$productFeather = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productFeather']));
		$productSell = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productSell']));
		$productHotDeal = $this->fm->validation(mysqli_real_escape_string($this->db->link, $data['productHotDeal']));

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
				$alert = '<div class="text-center text-noti-red">Thất bại</div>';
				return $alert;
			}
		}
	}

	public function deleteProduct($ID)
	{
		$ID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $ID));

		$queryImg = "SELECT productImage FROM tbl_product WHERE productID = '$ID' ";
		$productImage = $this->db->select($queryImg)->fetch_assoc()["productImage"];

		if (unlink('../admin/uploads/products/' . $productImage)) {
			$query = "DELETE FROM tbl_product WHERE productID = '$ID' ";
			$result = $this->db->delete($query);

			if ($result) {
				header("Location: productlist.php");
			} else {
				$alert = '<div class="text-center text-noti-red">Thất bại</div>';
				return $alert;
			}
		}

		$alert = '<div class="text-center text-noti-red">Thất bại</div>';
		return $alert;
	}
}
?>