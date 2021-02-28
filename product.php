<?php include_once "inc/header.php"; ?>

<?php
if (!isset($_GET["productID"]) || $_GET["productID"] == NULL) {
  echo '<script> window.location = "404.php" </script>';
} else {
  $productID = $_GET["productID"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
  $productQuantity = $_POST["productQuantity"];
  $insertCart = $cart->insertCart($productID, $productQuantity);
}

if (isset($_GET["wishlistID"]) && $_GET["wishlistID"] != NULL) {
  $productID = $_GET["wishlistID"];
  $insertWishlist = $wish->insertWishlist($productID);
}

if (isset($_GET["compareID"]) && $_GET["compareID"] != NULL) {
  $productID = $_GET["compareID"];
  $inserCompare = $com->inserCompare($productID);
}

?>

</div>
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="product.php">Chi tiết sản phẩm</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail ptb-60 ptb-sm-60">
  <div class="container">
    <div class="thumb-bg">
      <?php
      $getProduct = $product->getProductByID($productID);
      $catID;
      if ($getProduct) {
        while ($result = $getProduct->fetch_assoc()) {
          $catID = $result["productCategory"];
          $detailsProduct = $result["productDesc"];
      ?>
          <div class="row">
            <!-- Main Thumbnail Image Start -->
            <div class="col-lg-5 mb-all-40">
              <!-- Thumbnail Large Image start -->
              <div class="tab-content">
                <div id="thumb1" class="tab-pane fade show active">
                  <a data-fancybox="images" href=""><img style="width: 400px; height: 400px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="product-view"></a>
                </div>
              </div>
              <!-- Thumbnail Large Image End -->
            </div>
            <!-- Main Thumbnail Image End -->
            <!-- Thumbnail Description Start -->
            <div class="col-lg-7">
              <div class="thubnail-desc fix">
                <h3 class="product-header"><?php echo $result["productName"] ?></h3>
                <div class="rating-summary fix mtb-10">
                  <div class="rating">
                    <?php
                    $getStar = $review->getStar($productID);
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
                    echo " " . number_format((float)$starText, 1, '.', '');
                    ?>
                  </div>
                  <div class="rating-feedback">
                    <a href="#">
                      <?php
                      $getCountReview = $review->getCountReview($productID);
                      if ($getCountReview) {
                        $countReview = $getCountReview->fetch_assoc()["countReview"];
                        echo "Có " . $countReview . " đánh giá về sản phẩm.";
                      } else {
                        echo "Chưa có đánh giá nào.";
                      }
                      ?>
                    </a>
                  </div>
                </div>
                <div class="pro-price mtb-30">
                  <p class="d-flex align-items-center"><span class="prev-price"></span><span class="price"><?php echo $fm->formatMoney($result["productPrice"]) ?></span><span class="saving-price" style="display: none;"></span></p>
                </div>
                <p class="mb-20 pro-desc-details"><?php echo $result["productDesc"] ?></p>
                <div class="box-quantity d-flex hot-product2">
                  <form action="" method="POST">
                    <div style="display: flex;">
                      <input class="quantity mr-15" type="number" name="productQuantity" min="1" value="1" />
                      <input type="submit" name="submit" class="btn btn-primary" value="Thêm vào giỏ hàng" />
                      <div class="ml-md-2 pro-actions">
                        <div class="ml-2 actions-secondary">
                          <a href="product.php?wishlistID=<?php echo $result["productID"] ?>" title="" data-original-title="WishList"><i class="lnr lnr-heart"></i>
                            <span>Yêu thích</span></a>
                          <a href="product.php?compareID=<?php echo $result["productID"] ?>" title="" data-original-title="Compare"><i class="lnr lnr-sync"></i>
                            <span>So sánh</span></a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="pro-ref mt-20">
                  <p><span class="in-stock"><i class="ion-checkmark-round"></i> Còn hàng</span></p>
                </div>
              </div>
            </div>
            <!-- Thumbnail Description End -->
          </div>
      <?php
        }
      }
      ?>

      <!-- Row End -->
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-100 pb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="main-thumb-desc nav tabs-area" role="tablist">
          <li><a class="active" data-toggle="tab" href="#dtail">Mô tả</a></li>
          <li><a data-toggle="tab" href="#all-review">Đánh giá</a></li>
          <li><a data-toggle="tab" href="#your-review">Đánh giá của bạn</a></li>
        </ul>
        <!-- Product Thumbnail Tab Content Start -->
        <div class="tab-content thumb-content border-default">

          <div id="dtail" class="tab-pane fade show active">
            <p><?php echo $detailsProduct ?></p>
          </div>

          <div id="all-review" class="tab-pane fade ">
            <?php
            $getReview = $review->getReview($productID);
            if ($getReview) {
              $i = 0;
              while ($resultReview = $getReview->fetch_assoc()) {
                $i++;
            ?>
                <div class="row d-flex <?php if ($i % 2 == 0) {
                                          echo "justify-content-end";
                                        } ?>">
                  <div class="row comment-box">
                    <div class="comment-box-image">
                      <img class="avatar-comment" src="admin/uploads/avatars/<?php echo $resultReview["userImage"] ?>">
                    </div>
                    <div class="ml-1 mr-2 col">
                      <div class="row">
                        <p><b><?php echo $resultReview["userFullName"] ?></b></p>
                      </div>
                      <div class="row">
                        <p class="break-word"><?php echo $resultReview["comment"] ?></p>
                      </div>
                      <div class="row">
                        <div class="mr-2">
                          <div class="list-star">
                            <?php
                            $star = $resultReview["star"];
                            for ($j = 0; $j < $star; $j++) {
                              echo ' <i class="fa fa-star"></i>';
                            }
                            for ($star; $star < 5; $star++) {
                              echo ' <i class="fa fa-star-o"></i>';
                            }
                            ?>
                          </div>
                        </div>
                        <div>
                          <div class="time-comment">
                            <?php echo $resultReview["timeReview"] ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>

          <div id="your-review" class="tab-pane fade">
            <!-- Reviews Start -->
            <div class="review border-default universal-padding">
              <div class="group-title">
                <h2>Đánh giá của khách hàng</h2>
              </div>
              <h4 class="review-mini-title">Truemart</h4>
              <ul class="review-list">
                <!-- Single Review List Start -->
                <li>
                  <span>Quality</span>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <label>Truemart</label>
                </li>
                <!-- Single Review List End -->
                <!-- Single Review List Start -->
                <li>
                  <span>price</span>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <label>Review by <a href="https://themeforest.net/user/hastech">Truemart</a></label>
                </li>
                <!-- Single Review List End -->
                <!-- Single Review List Start -->
                <li>
                  <span>value</span>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <label>Posted on 7/20/18</label>
                </li>
                <!-- Single Review List End -->
              </ul>
            </div>
            <!-- Reviews End -->
            <!-- Reviews Start -->
            <div class="review border-default universal-padding mt-30">
              <h2 class="review-title mb-30">You're reviewing: <br><span>Faded Short Sleeves
                  T-shirt</span></h2>
              <p class="review-mini-title">your rating</p>
              <ul class="review-list">
                <!-- Single Review List Start -->
                <li>
                  <span>Quality</span>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                </li>
                <!-- Single Review List End -->
                <!-- Single Review List Start -->
                <li>
                  <span>price</span>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                </li>
                <!-- Single Review List End -->
                <!-- Single Review List Start -->
                <li>
                  <span>value</span>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </li>
                <!-- Single Review List End -->
              </ul>
              <!-- Reviews Field Start -->
              <div class="riview-field mt-40">
                <form autocomplete="off" action="#">
                  <div class="form-group">
                    <label class="req" for="sure-name">Nickname</label>
                    <input type="text" class="form-control" id="sure-name" required="required">
                  </div>
                  <div class="form-group">
                    <label class="req" for="subject">Summary</label>
                    <input type="text" class="form-control" id="subject" required="required">
                  </div>
                  <div class="form-group">
                    <label class="req" for="comments">Review</label>
                    <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                  </div>
                  <button type="submit" class="customer-btn">Submit Review</button>
                </form>
              </div>
              <!-- Reviews Field Start -->
            </div>
            <!-- Reviews End -->


            <!-- Reviews Start -->
            <div class="review border-default universal-padding mt-30">
              <h2 class="review-title mb-30">Các bài đánh giá</h2>
              <ul class="review-list">
                <!-- Single Review List Start -->
                <li>
                  <span>Quality</span>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                </li>
                <!-- Single Review List End -->

              </ul>
              <!-- Reviews Field Start -->
              <div class="riview-field mt-40">
                <form autocomplete="off" action="#">
                  <div class="form-group">
                    <label class="req" for="sure-name">Nickname</label>
                    <input type="text" class="form-control" id="sure-name" required="required">
                  </div>
                  <div class="form-group">
                    <label class="req" for="subject">Summary</label>
                    <input type="text" class="form-control" id="subject" required="required">
                  </div>
                  <div class="form-group">
                    <label class="req" for="comments">Review</label>
                    <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                  </div>
                  <button type="submit" class="customer-btn">Submit Review</button>
                </form>
              </div>
              <!-- Reviews Field Start -->
            </div>
            <!-- Reviews End -->
          </div>

        </div>
        <!-- Product Thumbnail Tab Content End -->
      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
<!-- Hot Deal Products Start Here -->
<div class="hot-deal-products off-white-bg pb-90 pb-sm-50">
  <div class="container">
    <!-- Product Title Start -->
    <div class="post-title pb-30">
      <h2>Sản phẩm liên quan</h2>
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
                <p><span class="price"><?php echo $fm->formatMoney($result["productPrice"]); ?></span> <del class="prev-price"></del></p>
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


<?php include_once "inc/footer.php"; ?>