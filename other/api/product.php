<?php
include_once './../../classes/product.php';
include_once './../../classes/review.php';
$product = new product();
$review = new review();
?>

<?php
if (isset($_GET["type"])) {
	$type = $_GET["type"];

	switch ($type) {
		case 'hot':
			$productHotDeal = $product->getProductHotDeal();
			if ($productHotDeal) {
				while ($row = $productHotDeal->fetch_object()) {
					$getStar = $review->getStar($row->productID);
					if ($getStar) {
						$starText = $getStar->fetch_assoc()["totalStar"];
						$star = floor($starText);
						$row->productStar = $star;
					}
					$result[] = $row;
				}
			}
			break;

		default:
			break;
	}

	if (isset($result)) {
		echo json_encode($result);
	} else {
		echo "NOT_FOUND_PRODUCT";
	}
}
// $brandID = 4;
// $productBrand = $product->getProductByBrand($brandID);
// if ($productBrand) {
//   while ($row = $productBrand->fetch_object()) {
//     $result[] = $row;
//   }
// }

// $cateID = 7;
// $productCate = $product->getProductByCategory($cateID);
// if ($productCate) {
//   while ($row = $productCate->fetch_object()) {
//     $result[] = $row;
//   }
// }

// $limit = 7;
// $productLimit = $product->getProductLimit();
// if ($productLimit) {
//   while ($row = $productLimit->fetch_object()) {
//     $result[] = $row;
//   }
// }

// $productFeather = $product->getProductFeather();
// if ($productFeather) {
//   while ($row = $productFeather->fetch_object()) {
//     $result[] = $row;
//   }
// }

// $productSell = $product->getProductSell();
// if ($productSell) {
//   while ($row = $productSell->fetch_object()) {
//     $result[] = $row;
//   }
// }


// $keyword = "mi";

// $searchProduct = $product->searchProduct($keyword);
// if ($searchProduct) {
//   while ($row = $searchProduct->fetch_object()) {
//     $result[] = $row;
//   }
// }




?>
