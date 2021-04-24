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
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->

<!-- Hot Deal Products Start Here -->
<div class="hot-deal-products pt-40 mt-40 off-white-bg pb-90 pb-sm-50">
  <div class="container">
    <!-- Product Title Start -->
    <div class="post-title pb-30">
      <h2>
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
    <!-- Product Title End -->
    <!-- Hot Deal Product Activation Start -->
    <div class="hot-deal-active owl-carousel">
      <!-- Single Product Start -->

      <?php
      $productCategory = $product->getProductByCategory($catID);
      if ($productCategory) {
        while ($result = $productCategory->fetch_assoc()) {
      ?>
          <!-- Single Product Start -->
          <div class="single-product">
            <!-- Product Image Start -->
            <div class="pro-img">
              <a href=product.php?productID=<?php echo $result["productID"] ?>">
                <img class="primary-img" style="height: 226px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                <img class="secondary-img" style="height: 226px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
              </a>
              <a href="product.php?productID=<?php echo $result["productID"] ?>" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
            </div>
            <!-- Product Image End -->
            <!-- Product Content Start -->
            <div class="pro-content">
              <div class="pro-info">
                <h4><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></h4>
                <p><span class="price"><?php echo $fm->formatMoney($result["productPrice"]); ?></span> </p>
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
            <!-- Product Content End -->
          </div>
          <!-- Single Product End -->
      <?php }
      } ?>
      <!-- Single Product End -->
    </div>
    <!-- Hot Deal Product Active End -->

  </div>
  <!-- Container End -->
</div>
<!-- Hot Deal Products End Here -->
<!-- Danh muc Products Area Start Here -->
<div class="arrivals-product pt-60 pb-80 pb-sm-45">
  <div class="container">
    <div class="main-product-tab-area">
      <div class="tab-menu mb-25">
        <div class="section-ttitle">
          <h2>Danh muc</h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav tabs-area" role="tablist">
          <?php
          $getCat = $cat->getCategory();
          if ($getCat) {
            $isActive = true;
            while ($result = $getCat->fetch_assoc()) {
          ?>
              <li class="nav-item">
                <a class="nav-link <?php if ($isActive) {
                                      echo 'active';
                                    }
                                    $isActive = false; ?>" data-toggle="tab" href="#cat<?php echo  $result["catID"] ?>"><?php echo $result["catName"] ?></a>
              </li>
          <?php
            }
          }
          ?>
        </ul>
      </div>
      <!-- Tab Contetn Start -->
      <div class="tab-content">
        <?php
        $getCat = $cat->getCategory();
        if ($getCat) {
          $isCatActive = true;
          while ($resultCat = $getCat->fetch_assoc()) {
            $catID = $resultCat["catID"]

        ?>
            <div id="cat<?php echo $catID ?>" class="tab-pane fade <?php if ($isCatActive) {
                                                                      echo "show active";
                                                                    };
                                                                    $isCatActive = false; ?>">
              <!-- Arrivals Product Activation Start Here -->
              <div class="electronics-pro-active owl-carousel">
                <?php
                $productByCategory = $product->getProductByCategory($catID);
                if ($productByCategory) {
                  while ($result = $productByCategory->fetch_assoc()) {
                ?>
                    <div class="double-product">
                      <!-- Single Product Start -->
                      <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                          <a href="product.php?productID=<?php echo $result["productID"] ?>">
                            <img class="primary-img" style="height: 381px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                            <img class="secondary-img" style="height: 381px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                          </a>
                          <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                          <div class="pro-info">
                            <h4><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></h4>
                            <p><span class="price"><?php echo $fm->formatMoney($result["productPrice"]); ?></span></p>
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
                            <div class="label-product l_sale"><span class="symbol-percent"></span></div>
                          </div>
                          <div class="pro-actions">
                            <div class="actions-primary">
                              <a href="product.php?productID=<?php echo $result["productID"] ?>" title="Xem chi tiết thông tin về sản phẩm">Xem chi tiết</a>
                            </div>
                            <div class="actions-secondary">
                              <a href="product.php?compare=<?php echo $result["productID"] ?>" title="Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                              <a href="product.php?wishlistID=<?php echo $result["productID"] ?>" title="Thêm vào yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                            </div>
                          </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">new</span>
                      </div>
                      <!-- Single Product End -->

                      <?php
                      $rowResult = $productByCategory->fetch_assoc();
                      if ($rowResult) {
                      ?>
                        <!-- Single Product Start -->
                        <div class="single-product">
                          <!-- Product Image Start -->
                          <div class="pro-img">
                            <a href="product.php?productID=<?php echo $rowResult["productID"] ?>">
                              <img class="primary-img" style="height: 381px; object-fit: cover;" src="admin/uploads/products/<?php echo $rowResult["productImage"] ?>" alt="single-product">
                              <img class="secondary-img" style="height: 381px; object-fit: cover;" src="admin/uploads/products/<?php echo $rowResult["productImage"] ?>" alt="single-product">
                            </a>
                            <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                          </div>
                          <!-- Product Image End -->
                          <!-- Product Content Start -->
                          <div class="pro-content">
                            <div class="pro-info">
                              <h4><a href="product.php?productID=<?php echo $rowResult["productID"] ?>"><?php echo $rowResult["productName"] ?></a></h4>
                              <p><span class="price"><?php echo $fm->formatMoney($rowResult["productPrice"]); ?></span></p>
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
                              <div class="label-product l_sale"><span class="symbol-percent"></span></div>
                            </div>
                            <div class="pro-actions">
                              <div class="actions-primary">
                                <a href="product.php?productID=<?php echo $rowResult["productID"] ?>" title="Xem chi tiết thông tin về sản phẩm">Xem chi tiết</a>
                              </div>
                              <div class="actions-secondary">
                                <a href="product.php?compare=<?php echo $rowResult["productID"] ?>" title="Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                                <a href="product.php?wishlistID=<?php echo $rowResult["productID"] ?>" title="Thêm vào yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                              </div>
                            </div>
                          </div>
                          <!-- Product Content End -->
                          <span class="sticker-new">new</span>
                        </div>
                        <!-- Single Product End -->
                      <?php } ?>
                    </div>
                <?php
                  }
                }
                ?>
              </div>
              <!-- Arrivals Product Activation End Here -->
            </div>
        <?php
          }
        }
        ?>
      </div>
      <!-- Tab Content End -->
    </div>
    <!-- main-product-tab-area-->
  </div>
  <!-- Container End -->
</div>
<!-- Danh muc Area End Here -->

<?php include_once "inc/footer.php"; ?>