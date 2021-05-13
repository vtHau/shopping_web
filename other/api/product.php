<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");

include_once './../../classes/product.php';
include_once './../../classes/review.php';
$product = new product();
$review = new review();
?>

<?php

$json = file_get_contents('php://input');
$info = json_decode($json, true);
$type =  $info["type"];

switch ($type) {
	case "UPDATE_VIEW":
		$productID = $info["productID"];
		$updateView = $product->updateViewProduct($productID);

		if ($updateView) {
			echo "UPDATE_VIEW_SUCCESS";
		} else {
			echo "UPDATE_VIEW_FAIL";
		}

		break;
	case "HOT":
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

			echo json_encode($result);
		} else {
			echo "NOT_FOUND_PRODUCT";
		}
		break;

	case 'BRAND':
		$brandID	 = $info["brandID"];

		$getProductByBrand = $product->getProductByBrand($brandID);
		if ($getProductByBrand) {
			while ($row = $getProductByBrand->fetch_object()) {
				$getStar = $review->getStar($row->productID);
				if ($getStar) {
					$starText = $getStar->fetch_assoc()["totalStar"];
					$star = floor($starText);
					$row->productStar = $star;
				}
				$result[] = $row;
			}

			echo json_encode($result);
		} else {
			echo "NOT_FOUND_PRODUCT";
		}
		break;

	case "SEARCH":
		$keyword = $info["keyword"];

		$searchProduct = $product->searchProduct($keyword);
		if ($searchProduct) {
			while ($row = $searchProduct->fetch_object()) {
				$getStar = $review->getStar($row->productID);
				if ($getStar) {
					$starText = $getStar->fetch_assoc()["totalStar"];
					$star = floor($starText);
					$row->productStar = $star;
				}
				$result[] = $row;
			}

			echo json_encode($result);
		} else {
			echo "NOT_FOUND_PRODUCT";
		}
		break;

	case "CATE":
		$catID = $info["catID"];

		$getProductByCate = $product->getProductByCategory($catID);
		if ($getProductByCate) {
			while ($row = $getProductByCate->fetch_object()) {
				$getStar = $review->getStar($row->productID);
				if ($getStar) {
					$starText = $getStar->fetch_assoc()["totalStar"];
					$star = floor($starText);
					$row->productStar = $star;
				}
				$result[] = $row;
			}

			echo json_encode($result);
		} else {
			echo "NOT_FOUND_PRODUCT";
		}
		break;

	default:
		# code...
		break;
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
