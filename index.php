<?php include_once "inc/header.php"; ?>


<!-- Slider Area Start Here -->
<div class="slider_box">
  <div class="slider-wrapper theme-default">
    <!-- Slider Background  Image Start-->
    <div id="slider" class="nivoSlider">
      <?php
      $getSlider = $slider->getSliderInUser();
      if ($getSlider) {
        while ($result = $getSlider->fetch_assoc()) {
      ?>
          <a style="width: 1920px; height: 409px; object-fit: cover; " href="product.php?productID=<?php echo $result["productID"] ?>"><img style="width: 1920px; height: 409px; object-fit: cover; " src="admin/uploads/sliders/<?php echo $result["sliderImage"] ?>" /></a>
      <?php
        }
      }
      ?>
    </div>
    <!-- Slider Background  Image Start-->
  </div>
</div>
</div>
<!-- Slider Area End Here -->

</div>
<!-- Brand Banner Area End Here -->


<!-- Trending Products Start Here -->
<div class="trendig-product pb-10 ">
  <div class="container">
    <div class="trending-box">
      <div class="title-box">
        <h2>Xu <br>Hướng</h2>
      </div>
      <div class="product-list-box">
        <!-- Arrivals Product Activation Start Here -->
        <div class="trending-pro-active owl-carousel">
          <?php
          $productFeather = $product->getProductFeather();
          if ($productFeather) {
            while ($result = $productFeather->fetch_assoc()) {
          ?>
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.php?productID=<?php echo $result["productID"] ?>">
                    <img class="primary-img" style="height: 226px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                  </a>
                  <a href="product.php?productID=<?php echo $result["productID"] ?>" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
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
                <!-- Product Content End -->
              </div>
              <!-- Single Product End -->
          <?php }
          } ?>
        </div>
        <!-- Arrivals Product Activation End Here -->
      </div>
      <!-- main-product-tab-area-->
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Trending Products End Here -->


<!-- Ban chay Start Here -->
<div class="trendig-product pb-100 ">
  <div class="container">
    <div class="trending-box">
      <div class="title-box">
        <h2>Bán<br>Chạy</h2>
      </div>
      <div class="product-list-box">
        <!-- Arrivals Product Activation Start Here -->
        <div class="trending-pro-active owl-carousel">
          <?php
          $productSell = $product->getProductSell();
          if ($productSell) {
            while ($result = $productSell->fetch_assoc()) {
          ?>
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.php?productID=<?php echo $result["productID"] ?>">
                    <img class="primary-img" style="height: 226px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                  </a>
                  <a href="product.php?productID=<?php echo $result["productID"] ?>" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
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
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="product.php?productID=<?php echo $result["productID"] ?>" title="Xem chi tiết thông tin về sản phẩm">Xem chi tiết</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="product.php?compareID=<?php echo $result["productID"] ?>" title=" Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                      <a href="product.php?wishlistID=<?php echo $result["productID"] ?>" title="Thêm vào yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
              </div>
              <!-- Single Product End -->
          <?php }
          } ?>
        </div>
        <!-- Arrivals Product Activation End Here -->
      </div>
      <!-- main-product-tab-area-->
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Ban chay End Here -->


<!-- Hot Deal Products Start Here -->
<div class="hot-deal-products  pb-90 pb-sm-50">
  <div class="container">
    <!-- Product Title Start -->
    <div class="post-title pb-30">
      <h2>hot deals</h2>
    </div>
    <!-- Product Title End -->
    <!-- Hot Deal Product Activation Start -->
    <div class="hot-deal-active owl-carousel">
      <!-- Single Product Start -->

      <?php
      $productHotDeal = $product->getProductHotDeal();
      if ($productHotDeal) {
        while ($result = $productHotDeal->fetch_assoc()) {
      ?>
          <!-- Single Product Start -->
          <div class="single-product">
            <!-- Product Image Start -->
            <div class="pro-img">
              <a href="product.php?productID=<?php echo $result["productID"] ?>">
                <img class="primary-img" style="height: 226px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
              </a>
              <a href="product.php?productID=<?php echo $result["productID"] ?>" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
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


<!-- Thuong hieu Products Area Start Here -->
<div class="arrivals-product pb-80 pb-sm-45" style="padding-top: 60px;">
  <div class="container">
    <div class="main-product-tab-area">
      <div class="tab-menu mb-25">
        <div class="section-ttitle">
          <h2>Thương hiệu</h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav tabs-area" role="tablist">
          <?php
          $getBrand = $brand->getBrand();
          if ($getBrand) {
            $isActive = true;
            while ($result = $getBrand->fetch_assoc()) {
          ?>
              <li class="nav-item">
                <a class="nav-link <?php if ($isActive) {
                                      echo 'active';
                                    }
                                    $isActive = false; ?>" data-toggle="tab" href="#brand<?php echo  $result["brandID"] ?>"><?php echo $result["brandName"] ?></a>
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
        $getBrand = $brand->getBrand();
        if ($getBrand) {
          $isBrandActive = true;
          while ($resultBrand = $getBrand->fetch_assoc()) {
            $brandID = $resultBrand["brandID"]

        ?>
            <div id="brand<?php echo $brandID ?>" class="tab-pane fade <?php if ($isBrandActive) {
                                                                          echo "show active";
                                                                        };
                                                                        $isBrandActive = false; ?>">
              <!-- Arrivals Product Activation Start Here -->
              <div class="electronics-pro-active owl-carousel">
                <?php
                $productByBrand = $product->getProductByBrand($brandID);
                if ($productByBrand) {
                  while ($result = $productByBrand->fetch_assoc()) {
                ?>
                    <div class="double-product">
                      <!-- Single Product Start -->
                      <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                          <a href="product.php?productID=<?php echo $result["productID"] ?>">
                            <img class="primary-img" style="height: 381px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
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
                              <a href="product.php?compareID=<?php echo $result["productID"] ?>" title="Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                              <a href="product.php?wishlistID=<?php echo $result["productID"] ?>" title="Thêm vào yêu thích"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                            </div>
                          </div>
                        </div>
                        <!-- Product Content End -->
                        <span class="sticker-new">new</span>
                      </div>
                      <!-- Single Product End -->

                      <?php
                      $rowResult = $productByBrand->fetch_assoc();
                      if ($rowResult) {
                      ?>
                        <!-- Single Product Start -->
                        <div class="single-product">
                          <!-- Product Image Start -->
                          <div class="pro-img">
                            <a href="product.php?productID=<?php echo $rowResult["productID"] ?>">
                              <img class="primary-img" style="height: 381px; object-fit: cover;" src="admin/uploads/products/<?php echo $rowResult["productImage"] ?>" alt="single-product">
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
<!-- Thuong hieu Area End Here -->


<!-- Danh muc Products Area Start Here -->
<div class="arrivals-product pb-80 pb-sm-45">
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
                              <a href="product.php?compareID=<?php echo $result["productID"] ?>" title="Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
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


<!-- San pham moi -->
<div class="like-product pt-50  pt-sm-50 pb-sm-55 ">
  <div class="container">
    <div class="like-product-area">
      <h2 class="section-ttitle2 mb-30" style="font-size: 40px;">Sản Phẩm Mới</h2>
      <!-- Arrivals Product Activation Start Here -->
      <div class="like-pro-active owl-carousel">
        <?php
        $getProduct = $product->getProductLimit();
        if ($getProduct) {
          while ($result = $getProduct->fetch_assoc()) {
        ?>
            <div class="single-product">
              <!-- Product Image Start -->
              <div class="pro-img">
                <a href="product.php?productID=<?php echo $result["productID"] ?>">
                  <img class="primary-img" style="height: 277px; width: 222px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
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
                  <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                </div>
                <div class="pro-actions">
                  <div class="actions-primary">
                    <a href="product.php?productID=<?php echo $result["productID"] ?>" title="Xem chi tiết về thông tin sản phẩm">Xem chi tiêt</a>
                  </div>
                  <div class="actions-secondary">
                    <a href="product.php?compareID=<?php echo $result["productID"] ?>" title="Thêm vào so sánh"><i class="lnr lnr-sync"></i> <span>Thêm so sánh</span></a>
                    <a href=product.php?wishlistID=<?php echo $result["productID"] ?>" title="Thêm vào so sánh"><i class="lnr lnr-heart"></i> <span>Thêm yêu thích</span></a>
                  </div>
                </div>
              </div>
              <!-- Product Content End -->
            </div>
        <?php }
        } ?>

      </div>
      <!-- Arrivals Product Activation End Here -->
    </div>
    <!-- main-product-tab-area-->
  </div>
  <!-- Container End -->
</div>
<!-- San pham moi -->


<!-- Brand Banner Area Start Here -->
<div class="main-brand-banner   pb-100 pb-sm-60 pt-sm-55" style="padding-top: 60px;">
  <div class="container">
    <div class="section-ttitle mb-30 text-center">
      <h2 class="section-ttitle2 mb-30" style="font-size: 40px;">Danh sách thương hiệu</h2>
    </div>
    <div class="row no-gutters">
      <div class="col-lg-3">
        <div class="col-img">
          <img src="assets\img\banner\h1-band1.jpg" alt="">
        </div>
      </div>
      <div class="col-lg-6">
        <!-- Brand Banner Start -->
        <div class="brand-banner owl-carousel">
          <?php
          $getBrand = $brand->getBrand();
          if ($getBrand) {
            while ($result = $getBrand->fetch_assoc()) {
          ?>
              <div class="single-brand">

                <a href="product.php?productID=<?php echo $result["brandID"] ?>"><img class="img" style="height: 83px; widht:173px; object-fit: cover;" src="admin/uploads/brands/<?php echo $result["brandImage"] ?>" /></a>

                <?php
                $rowResult = $getBrand->fetch_assoc();
                if ($rowResult) {
                ?>
                  <a href="product.php?brandID=<?php echo $rowResult["brandID"] ?>"><img class="img" style="height: 83px; widht:173px; object-fit: cover;" src="admin/uploads/brands/<?php echo $rowResult["brandImage"] ?>" /></a>

                <?php } ?>

                <?php
                $rowResult = $getBrand->fetch_assoc();
                if ($rowResult) {
                ?>
                  <a href="product.php?brandID=<?php echo $rowResult["brandID"] ?>"><img class="img" style="height: 83px; widht:173px; object-fit: cover;" src="admin/uploads/brands/<?php echo $rowResult["brandImage"] ?>" /></a>

                <?php } ?>

              </div>
          <?php
            }
          }
          ?>

        </div>
        <!-- Brand Banner End -->
      </div>
      <div class="col-lg-3">
        <div class="col-img">
          <img src="assets\img\banner\h1-band2.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Brand Banner Area End Here -->

<?php include_once "inc/footer.php"; ?>