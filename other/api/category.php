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

if (isset($result)) {
  echo json_encode($result);
} else {
  echo "NOT_FOUND_CATEGORY";
}


?>
