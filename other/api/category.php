<?php
include_once './../../classes/category.php';
$cate = new category();
?>

<?php
$getCate = $cate->getCategoryLimit(5);
if ($getCate) {
  while ($row = $getCate->fetch_object()) {
    $result[] = $row;
  }
}

$cateResult = ["category" => $result];

echo json_encode($cateResult);
?>
