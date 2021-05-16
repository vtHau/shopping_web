<?php include_once "inc/header.php"; ?>

<?php
if (!isset($_GET["catID"]) || $_GET["catID"] == NULL) {
  header("Location: index.php");
} else {
  $catID = $_GET["catID"];
  $getCategory = $cat->getCategoryByID($catID);
  if (!$getCategory) {
    header("Location: index.php");
  }
}
?>

</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="category.php">Danh mục</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="hot-deal-products pt-40 mt-40  pb-90 pb-sm-50">
  <div class="container">
    <!-- Product Title Start -->
    <div class="post-title pb-30">
      <h2 class="title-name title-search">
        Danh mục
        <?php
        $getCategory = $cat->getCategoryByID($catID);
        if ($getCategory) {
          $result = $getCategory->fetch_assoc();
          $catName = $result["catName"];
          echo ':   ' . $catName;
        }
        ?>
      </h2>
    </div>

    <ul class="work-list">
      <?php
      $productCategory = $product->getProductByCategory($catID);
      if ($productCategory) {
        while ($result = $productCategory->fetch_assoc()) {
      ?>
          <li class="work-item">
            <div class="single-product">
              <div class="pro-img">
                <a href="product.php?productID=<?php echo $result["productID"] ?>">
                  <img class="primary-img" style="height: 226px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                </a>
                <p class="quick_view product-text-view" title="Lượt xem"> <i class="fas fa-eye"></i> <?php echo  $result["productView"] ?></p>
              </div>
              <div class="pro-content">
                <div class="pro-info">
                  <h4><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></h4>
                  <p>
                    <span class="price"><?php echo $fm->formatMoney($result["productPrice"]); ?></span>
                  </p>
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
                </div>
                <div class="pro-actions">
                  <div class="actions-primary">
                    <a href="product.php?productID=<?php echo $result["productID"] ?>" title="Xem chi tiết thông tin về sản phẩm">Xem chi tiết</a>
                  </div>
                  <div class="actions-secondary">
                    <a href="product.php?compareID=<?php echo $result["productID"] ?>" title="Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                    <a href="product.php?wishlistID=<?php echo $result["productID"] ?>" title="Thêm vào yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                  </div>
                </div>
              </div>
            </div>
          </li>
      <?php }
      } ?>
    </ul>
  </div>
</div>
<?php include_once "inc/footer.php"; ?>