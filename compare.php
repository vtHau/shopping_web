<?php include_once "inc/header.php"; ?>

<?php
if (isset($_GET["productID"]) && $_GET["productID"] != NULL) {
  $productID = (int)$_GET["productID"];
  $getProduct = $product->getProductByID((int)$_GET["productID"]);

  if (!$getProduct) {
    header("Location: index.php");
  } else {
    $insertCart = $cart->insertCart($productID, 1);
  }
}
?>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="compare.php">So sánh sản phẩm</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="compare-product ptb-60 ptb-sm-60">
  <div class="container">
    <div class="table-responsive-sm">
      <table class="table text-center compare-content">
        <tbody>
          <tr>
            <td class="product-title">Sản phẩm</td>
            <?php
            $getCom = $com->getCompare();
            if ($getCom) {
              while ($result = $getCom->fetch_assoc()) {
            ?>
                <td class="product-description">
                  <div class="compare-details">
                    <div class="compare-detail-img">
                      <a href="product.php?productID=<?php echo $result["productID"] ?>"><img style="width: 294px; height: 294px; object-fit:cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="compare-product"></a>
                    </div>
                    <div class="compare-detail-content">
                      <span></span>
                      <h4><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></h4>
                    </div>
                  </div>
                </td>
            <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td class="product-title">Thông tin</td>
            <?php
            $getCom = $com->getCompare();
            if ($getCom) {
              while ($result = $getCom->fetch_assoc()) {
            ?>
                <td class="product-description">
                  <p><?php echo $result["productDesc"] ?></p>
                </td>
            <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td class="product-title">Giá</td>
            <?php
            $getCom = $com->getCompare();
            if ($getCom) {
              while ($result = $getCom->fetch_assoc()) {
            ?>
                <td class="product-description"><?php echo $fm->formatMoney($result["productPrice"]) ?></td>
            <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td class="product-title">Giỏ hàng</td>
            <?php
            $getCom = $com->getCompare();
            if ($getCom) {
              while ($result = $getCom->fetch_assoc()) {
            ?>
                <td class="product-description">
                  <a class="compare-cart text-uppercase add-cart" style=" cursor: pointer; border: none; background-image: linear-gradient(to right, #37ccff, #7b22ff);" data-id="<?php echo $result["productID"] ?>">Thêm vào giỏ hàng</a>
                </td>
            <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td class="product-title">Xóa</td>
            <?php
            $getCom = $com->getCompare();
            if ($getCom) {
              while ($result = $getCom->fetch_assoc()) {
            ?>
                <td class="product-description">
                  <a>
                    <i class="fa fa-trash-o del-compare" data-id="<?php echo $result["compareID"] ?>"></i>
                  </a>
                </td>
            <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td class="product-title">Đánh giá</td>
            <?php
            $getCom = $com->getCompare();
            if ($getCom) {
              while ($result = $getCom->fetch_assoc()) {
            ?>
                <td class="product-description">
                  <div class="rating">
                    <?php
                    $getStar = $review->getStar($result["productID"]);
                    if ($getStar) {
                      $starText = $getStar->fetch_assoc()["totalStar"];
                      $star = floor($starText);

                      for ($i = 0; $i < $star; $i++) {
                        echo ' <i class="fa fa-star"></i>';
                      }
                      for ($star; $star < 5; $star++) {
                        echo ' <i class="fa fa-star-o"></i>';
                      }
                    }
                    if ($starText != 0) {
                      echo " " . number_format((float)$starText, 1, '.', '');
                    }
                    ?>
                  </div>
                </td>
            <?php
              }
            }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script type="text/javascript">
  document.title = "So sánh sản phẩm";
</script>
<?php include_once "inc/footer.php"; ?>