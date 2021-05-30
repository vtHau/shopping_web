<?php include_once "inc/header.php"; ?>

<?php
$title = "";
if (!isset($_GET["productID"]) || $_GET["productID"] == NULL) {
  header("Location: index.php");
} else {
  $productID = (int)$_GET["productID"];
  $getProduct = $product->getProductByID((int)$_GET["productID"]);
  if (!$getProduct) {
    header("Location: index.php");
  }
  $updateViewProduct = $product->updateViewProduct($productID);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
  $productQuantity = $_POST["productQuantity"];
  $insertCart = $cart->insertCart($productID, $productQuantity);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["type"])) {
  $productID = $_POST["productID"];
  $comment = $_POST["comment"];
  $star = $_POST["star"];

  if ($_POST["type"] == "insert") {
    $insertReview = $review->insertReview($productID, $star, $comment);
  } elseif ($_POST["type"] == "update") {
    $updateReview = $review->updateReview($productID, $star, $comment);
  } elseif ($_POST["type"] == "delete") {
    $deleteReview = $review->deleteReview($productID);
  }
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

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="product.php">Chi tiết sản phẩm</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="main-product-thumbnail ptb-60 ptb-sm-60">
  <div class="container">
    <div class="thumb-bg">
      <?php
      $getProduct = $product->getProductByID($productID);
      if ($getProduct) {
        while ($result = $getProduct->fetch_assoc()) {
          $catID = $result["productCategory"];
          $detailsProduct = $result["productDesc"];
          $productName = $result["productName"];
      ?>
          <div class="row">
            <div class="col-lg-5 mb-all-40">
              <div class="tab-content">
                <div id="thumb1" class="tab-pane fade show active">
                  <a data-fancybox="images" href=""><img id="img-zoom" style="width: 400px; height: 400px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="product-view"></a>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="thubnail-desc fix">
                <h3 class="product-header"><?php $title = $result["productName"];
                                            echo $result["productName"];
                                            ?></h3>
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
                      <input class="quantity mr-15 custom-box-quantity" type="number" name="productQuantity" min="1" value="1" />
                      <input type="submit" name="submit" class="btn btn-primary custom-btn-submit" value="Thêm vào giỏ hàng" />
                      <div class="ml-md-2 pro-actions">
                        <div class="ml-2 actions-secondary">
                          <a href="product.php?wishlistID=<?php echo $result["productID"] ?>" title="" data-original-title="WishList"><i class="fas fa-heartbeat" style="color: #FF006F;"></i>
                            <span>Yêu thích</span></a>
                          <a href="product.php?compareID=<?php echo $result["productID"] ?>" title="" data-original-title="Compare"><i class="fas fa-sync-alt" style="color: #414DD1;"></i>
                            <span>So sánh</span></a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="pro-ref mt-20">

                </div>
              </div>
            </div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</div>
<div class="thumnail-desc pb-100 pb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="main-thumb-desc nav tabs-area" role="tablist">
          <li><a class="active" data-toggle="tab" href="#dtail">Mô tả</a></li>
          <li><a data-toggle="tab" href="#all-review">Đánh giá</a></li>
          <?php
          if (Session::isUserLogin()) {
            echo '<li><a data-toggle="tab" href="#your-review">Đánh giá của bạn</a></li>';
          }  ?>
        </ul>
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
            } else {
              ?>
              <p>Không có bình luận nào để hiển thị</p>
            <?php } ?>
          </div>

          <div id="your-review" class="tab-pane fade">
            <?php
            $getComment = $review->getComment($productID);
            if (!$getComment) {
            ?>
              <div class="review border-default universal-padding mt-30">

                <h2 class="review-title mb-30">
                  SẢN PHẨM: <br>
                  <span><?php echo $productName ?></span>
                </h2>
                <p class="review-mini-title">Đánh giá</p>
                <ul class="review-list">
                  <li class="review-list-li">
                    <i class="fa fa-star-o" data-index="1"></i>
                    <i class="fa fa-star-o" data-index="2"></i>
                    <i class="fa fa-star-o" data-index="3"></i>
                    <i class="fa fa-star-o" data-index="4"></i>
                    <i class="fa fa-star-o" data-index="5"></i>
                  </li>
                </ul>
                <div class="riview-field mt-40">
                  <form autocomplete="off" action="" id="form-review" method="POST">
                    <div class="form-group">
                      <label class="req" for="comments">Bình luận</label>
                      <input type="hidden" class="productID" value="<?php echo $productID; ?>">
                      <textarea class="form-control review-comment" rows="5" id="comment" name="review-comment" required="required"></textarea>
                    </div>
                    <div class="customer-btn review-submit">Gửi</div>
                  </form>
                </div>
              </div>
              <?php } else {
              while ($resultCom = $getComment->fetch_assoc()) {
              ?>
                <h5 class="text-center mb-4">Bạn đã bình luận về sản phẩm này rồi</h5>
                <div class="row d-flex justify-content-center">
                  <div class="row comment-box">
                    <div class="comment-box-image">
                      <img class="avatar-comment" src="admin/uploads/avatars/<?php echo $resultCom["userImage"] ?>">
                    </div>
                    <div class="ml-1 col">
                      <div class="row">
                        <p><b><?php echo $resultCom["userFullName"] ?></b></p>
                      </div>
                      <div class="row">
                        <p class="break-word"><?php echo $resultCom["comment"] ?></p>
                      </div>
                      <div class="row">
                        <div class="mr-2">
                          <div class="list-star">

                            <?php
                            $star = floor($resultCom["star"]);
                            for ($i = 0; $i < $star; $i++) {
                            ?>
                              <i class="fa fa-star"></i>
                            <?php
                            }
                            for ($star; $star < 5; $star++) {
                            ?>
                              <i class="fa fa-star-o"></i>
                            <?php } ?>
                          </div>
                        </div>
                        <div>
                          <div class="time-comment">
                            <?php echo $resultCom["timeReview"] ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mr-2 feature-review">
                      <input type="hidden" class="productID" value="<?php echo $productID; ?>">
                      <?php
                      if ($resultCom["status"] == 0) {
                        echo '<i class="fa fa-spinner" style="color: green;"></i>';
                      } else {
                        echo '<i class="fa fa-check-circle-o" style="color: green;"></i>';
                      }
                      ?>
                      <i class="fa fa-edit" id="edit-comment"></i>
                      <i class="fas fa-trash" id="delete-comment"></i>
                    </div>
                  </div>
                </div>

                <div class="review border-default universal-padding mt-30 box-edit">
                  <h2 class="review-title mb-30 text-center">
                    Chỉnh sửa bình luận
                  </h2>
                  <p class="review-mini-title">Đánh giá</p>
                  <ul class="review-list">
                    <li class="review-list-li">
                      <?php
                      $star = floor($resultCom["star"]);
                      for ($i = 0; $i < $star; $i++) {
                      ?>
                        <i class="fa fa-star" data-index="<?php echo $i  + 1 ?>"></i>
                      <?php
                      }
                      for ($star; $star < 5; $star++) {
                      ?>
                        <i class="fa fa-star-o" data-index="<?php echo $star + 1 ?>"></i>
                      <?php } ?>
                    </li>
                  </ul>
                  <div class="riview-field mt-40">
                    <form autocomplete="off" action="" id="form-review" method="POST">
                      <div class="form-group">
                        <label class="req" for="comments">Bình luận</label>
                        <input type="hidden" class="productID" value="<?php echo $productID; ?>">
                        <textarea class="form-control review-comment" rows="5" id="comment" name="review-comment" required="required"><?php echo $resultCom["comment"] ?></textarea>
                      </div>
                      <div class="customer-btn review-update">Gửi</div>
                    </form>
                  </div>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="hot-deal-products pb-90 pb-sm-50">
  <div class="container">
    <div class="post-title pb-10">
      <h2>Sản phẩm liên quan</h2>
    </div>
    <div class="hot-deal-active owl-carousel">
      <?php
      $productCategory = $product->getProductByCategory($catID);
      if ($productCategory) {
        while ($result = $productCategory->fetch_assoc()) {
      ?>
          <div class="single-product">
            <div class="pro-img">
              <a href="product.php?productID=<?php echo $result["productID"] ?>">
                <img class="primary-img" style="height: 226px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
              </a>
              <a href="product.php?productID=<?php echo $result["productID"] ?>" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
            </div>
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
                  <a href="product.php?compareID=<?php echo $result["productID"] ?>" title="Thêm vào so sánh"><i class="fas fa-sync-alt"></i> <span>Thêm so sánh</span></a>
                  <a href="product.php?wishlistID=<?php echo $result["productID"] ?>" title="Thêm vào yêu thích"><i class="fas fa-heartbeat"></i> <span>Thêm yêu thích</span></a>
                </div>
              </div>
            </div>
          </div>
      <?php }
      } ?>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.title = "<?= $title ?>";
</script>

<?php include_once "inc/footer.php"; ?>