<?php
include_once './../../classes/brand.php';
$brand = new brand();
?>

<?php
$getBrand = $brand->getBrandLimit(5);
if ($getBrand) {
  while ($row = $getBrand->fetch_object()) {
    $result[] = $row;
  }
}
if (isset($getBrand)) {
  $brandResult = ["brand" => $result];
  echo json_encode($brandResult);
} else {
  echo "NOT_FOUND_BRAND";
}


?>
