<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class wishlist
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

	public function getWishlist()
	{
		$userID = $this->getUserID();

		$query = "SELECT * FROM tbl_wishlist WHERE userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCountWishlist()
	{
		$userID = $this->getUserID();

		$query = "SELECT COUNT(productID) AS countWishlist FROM tbl_wishlist WHERE userID = '$userID'";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	public function insertWishlist($productID)
	{
		$productID = mysqli_real_escape_string($this->db->link, $productID);

		$query = "SELECT * FROM tbl_product WHERE productID = '$productID' ";
		$result = $this->db->select($query)->fetch_assoc();

		$productName = $result['productName'];
		$productPrice = $result['productPrice'];
		$productImage = $result['productImage'];

		$userID = $this->getUserID();

		$queryInsert = "INSERT INTO tbl_wishlist(userID, productID, productName, productPrice, productImage) VALUES('$userID', '$productID', '$productName','$productPrice', '$productImage' ) ";
		$resultInsert = $this->db->insert($queryInsert);

		if ($resultInsert) {
			header('Location:wishlist.php');
		} else {
			$msg = "them that bai";
			return $msg;
		}


		// if ($result['product_remain'] > $quantity) {

		// 	$query_insert = "INSERT INTO tbl_wishlist(productId,productName,quantity,sId,price,image) VALUES('$id','$productName','$quantity','$sId','$price','$image' ) ";
		// 	$insert_cart = $this->db->insert($query_insert);
		// 	if ($result) {
		// 		header('Location:cart.php');
		// 	} else {
		// 		header('Location:404.php');
		// 	}
		// } else {
		// 	$msg = "<span class='erorr'> Số lượng " . $quantity . " bạn đặt quá số lượng chúng tôi chỉ còn " . $result['product_remain'] . " cái</span> ";
		// 	return $msg;
		// }
	}

	public function deleteWishlist($wishlistID)
	{
		$wishlistID = mysqli_real_escape_string($this->db->link, $wishlistID);
		$query = "DELETE FROM tbl_wishlist WHERE wishlistID = '$wishlistID'";
		$result = $this->db->delete($query);
		if ($result) {
			header('Location:wishlist.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}
}
?>