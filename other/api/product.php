<?php
include_once './../../classes/product.php';
$product = new product();
?>

<?php
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

$limit = 7;
$productLimit = $product->getProductLimit();
if ($productLimit) {
  while ($row = $productLimit->fetch_object()) {
    $result[] = $row;
  }
}

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

// $productHotDeal = $product->getProductHotDeal();
// if ($productHotDeal) {
//   while ($row = $productHotDeal->fetch_object()) {
//     $result[] = $row;
//   }
// }

$productResult = ["product" => $result];

echo json_encode($productResult);
?>
