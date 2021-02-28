﻿<?php include_once "inc/header.php"; ?>

<?php
if (isset($_GET["productID"]) && $_GET["productID"] != NULL) {
  $productID = $_GET["productID"];
  $insertCart = $cart->insertCart($productID, 1);
}

if (isset($_GET["deleteID"]) && $_GET["deleteID"] != NULL) {
  $compareID = $_GET["deleteID"];
  $deleteCompare = $com->deleteCompare($compareID);
}

?>

</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="compare.php">So sánh sản phẩm</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Compare Page Start -->
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
                <td class="product-description"><?php echo $result["productPrice"] ?></td>
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
                  <a class="compare-cart text-uppercase" href="compare.php?productID=<?php echo $result["productID"] ?>"> + add to cart</a>
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
                  <a href="compare.php?deleteID=<?php echo $result["compareID"] ?>">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
            <?php
              }
            }
            ?>
          </tr>
          <tr>
            <td class="product-title">Đánh giá</td>

            <td class="product-description">
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
              </div>

            </td>
            <td class="product-description">
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </td>
            <td class="product-description">
              <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
              </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- Compare Page End -->
<?php include_once "inc/footer.php"; ?>