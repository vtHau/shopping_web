<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class cart
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

	public function getCart()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "SELECT * FROM tbl_cart WHERE userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCartByID($userID)
	{
		$userID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
		$query =
			"SELECT tbl_product.*, tbl_cart.* ,  tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID INNER JOIN tbl_cart ON  tbl_cart.productID = tbl_product.productID  
			   WHERE tbl_cart.userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCountCart()
	{
		$userID = $this->getUserID();

		$query = "SELECT COUNT(productID) AS countCart FROM tbl_cart WHERE userID = '$userID'";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	public function insertCart($productID, $productQuantity)
	{
		$productQuantity = $this->fm->validation($productQuantity);
		$productQuantity = mysqli_real_escape_string($this->db->link, $productQuantity);
		$productID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));

		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "SELECT * FROM tbl_cart WHERE userID = '$userID' AND productID = '$productID' ";
		$result = $this->db->select($query);

		if ($result) {
			$productQuantity = $result->fetch_assoc()["productQuantity"] + 1;
			$query = "UPDATE tbl_cart SET productQuantity = '$productQuantity' WHERE userID = '$userID' AND productID = '$productID' ";
			$result = $this->db->update($query);
			if ($result) {
				header("Location: cart.php");
			}
			return false;
		} else {
			$query = "SELECT * FROM tbl_product WHERE productID = '$productID' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['productName'];
			$productPrice = $result['productPrice'];
			$productImage = $result['productImage'];

			$queryInsert = "INSERT INTO tbl_cart(userID, productID, productName, productPrice, productQuantity, productImage) VALUES('$userID', '$productID', '$productName','$productPrice','$productQuantity','$productImage' ) ";
			$resultInsert = $this->db->insert($queryInsert);

			if ($resultInsert) {
				header("Location: cart.php");
			} else {
				return false;
			}
		}
	}

	public function insertCartMobile($userID, $productID, $productQuantity)
	{
		$userID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
		$productQuantity = $this->fm->validation($productQuantity);
		$productQuantity = mysqli_real_escape_string($this->db->link, $productQuantity);
		$productID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$query = "SELECT * FROM tbl_cart WHERE userID = '$userID' AND productID = '$productID'";
		$result = $this->db->select($query);

		if ($result) {
			$productQuantity = $result->fetch_assoc()["productQuantity"] + 1;
			$query = "UPDATE tbl_cart SET productQuantity = '$productQuantity' WHERE userID = '$userID' AND productID = '$productID' ";
			$result = $this->db->update($query);
			if ($result) {
				return true;
			}
			return false;
		} else {
			$query = "SELECT * FROM tbl_product WHERE productID = '$productID' ";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['productName'];
			$productPrice = $result['productPrice'];
			$productImage = $result['productImage'];

			$queryInsert = "INSERT INTO tbl_cart(userID, productID, productName, productPrice, productQuantity, productImage) VALUES('$userID', '$productID', '$productName','$productPrice','$productQuantity','$productImage' ) ";
			$resultInsert = $this->db->insert($queryInsert);

			if ($resultInsert) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function updateCartQuantity($cartID, $productQuantity)
	{
		$cartID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $cartID));
		$productQuantity =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $productQuantity));

		$query = "UPDATE tbl_cart SET productQuantity = '$productQuantity' WHERE cartID = '$cartID'";
		$result = $this->db->update($query);

		if ($result) {
			return true;
		}
		return false;
	}

	public function updateQuantityCart($cartID, $productQuantity)
	{
		$cartID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $cartID));
		$productQuantity =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $productQuantity));

		$query = "UPDATE tbl_cart SET productQuantity = '$productQuantity' WHERE cartID = '$cartID'";
		$result = $this->db->update($query);

		if ($result) {
			return "UPDATE_QUANTITY_SUCCESS";
		} else {
			return "UPDATE_QUANTITY_FAIL";
		}
	}

	public function deleteCartByID($cartID)
	{
		$cartID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $cartID));
		$query = "DELETE FROM tbl_cart WHERE cartID = '$cartID'";
		$result = $this->db->delete($query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteCart($cartID)
	{
		$cartID =  $this->fm->validation(mysqli_real_escape_string($this->db->link, $cartID));
		$query = "DELETE FROM tbl_cart WHERE cartID = '$cartID'";
		$result = $this->db->delete($query);
		if ($result) {
			header('Location:cart.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function deleteAllCart()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "DELETE FROM tbl_cart WHERE userID = '$userID'";
		$result = $this->db->delete($query);

		if ($result) {
			header('Location: orderdetails.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}
}
?>