<?php include_once "inc/header.php"; ?>


<!-- Slider Area Start Here -->
<div class="slider_box">
  <div class="slider-wrapper theme-default">
    <!-- Slider Background  Image Start-->
    <div id="slider" class="nivoSlider">
      <a href="shop.html"><img src="assets\img\slider\5.jpg" data-thumb="img/slider/5.jpg" alt="" title="#htmlcaption"></a>
      <a href="shop.html"><img src="assets\img\slider\6.jpg" data-thumb="img/slider/6.jpg" alt="" title="#htmlcaption2"></a>
    </div>
    <!-- Slider Background  Image Start-->
  </div>
</div>
</div>
<!-- Slider Area End Here -->


<!-- Brand Banner Area Start Here -->
<div class="image-banner pb-30 off-white-bg">
  <div class="container">
    <div class="col-img">
      <a href="#"><img src="assets\img\banner\h1-banner.jpg" alt="image banner"></a>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Brand Banner Area End Here -->


<!-- Trending Products Start Here -->
<div class="trendig-product pb-10 off-white-bg">
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
                      <a href="product.php?productID=<?php echo $result["productID"] ?>" title="Xem chi tiết">Xem chi tiết</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
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
<div class="trendig-product pb-100 off-white-bg">
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
                      <a href="product.php?productID=<?php echo $result["productID"] ?>" title="Xem chi tiết">Xem chi tiết</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
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
<div class="hot-deal-products off-white-bg pb-90 pb-sm-50">
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
                  <a href="product.php?productID=<?php echo $result["productID"] ?>" title="Xem chi tiết">Xem chi tiết</a>
                </div>
                <div class="actions-secondary">
                  <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                      Compare</span></a>
                  <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                      WishList</span></a>
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
<div class="arrivals-product  pb-85 pb-sm-45" style="padding-top: 60px;">
  <div class="container">
    <div class="main-product-tab-area">
      <div class="tab-menu mb-25">
        <div class="section-ttitle">
          <h2>Thương hiệu</h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav tabs-area" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#fshion">Fashion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#beauty">Beauty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#electronics">Sport/Outdoor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#kids">Living</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#beauty">Food</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#kids">Baby/Kids</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#electronics">Electronics </a>
          </li>
        </ul>

      </div>

      <!-- Tab Contetn Start -->
      <div class="tab-content">
        <div id="fshion" class="tab-pane fade">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\2.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                    <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                    <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\3.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\4.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Gpoly and Bark Eames Style</a></h4>
                    <p><span class="price">$150.30</span><del class="prev-price">$175.50</del></p>
                    <div class="label-product l_sale">10<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\5.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\6.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\8.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\9.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Eames and Bark Style</a></h4>
                    <p><span class="price">$180.45</span><del class="prev-price">$200.50</del></p>
                    <div class="label-product l_sale">18<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\11.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\12.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Eames and Vortex Side</a></h4>
                    <p><span class="price">$160.45</span><del class="prev-price">$190.50</del></p>
                    <div class="label-product l_sale">12<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\15.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\16.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Bark Vortex Side Eames</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\13.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\14.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\7.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #fshion End Here -->
        <div id="kids" class="tab-pane fade show active">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\42.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\43.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Utensils and Knives Block</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\40.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\41.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Terra Xpress HE Cooking </a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$300.50</del></p>
                    <div class="label-product l_sale">25<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\39.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\38.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Robert Welch Knife Block</a></h4>
                    <p><span class="price">$100.45</span><del class="prev-price">$150.50</del></p>
                    <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\36.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\37.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$90.50</span><del class="prev-price">$120.50</del></p>
                    <div class="label-product l_sale">15<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\35.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\36.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Bark and Vortex Side</a></h4>
                    <p><span class="price">$69.20</span><del class="prev-price">$145.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\34.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\35.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Compary and Bark Vortex Shewe</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\32.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\33.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">kallery kids weare</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\7.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #fshion End Here -->
        <div id="beauty" class="tab-pane fade">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\43.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\42.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\41.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\39.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\5.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\6.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\9.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\10.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\11.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\12.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\3.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\4.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\43.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\42.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\7.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #beauty End Here -->
        <div id="electronics" class="tab-pane fade">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\17.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\18.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Flos Chasen S2 Suspension</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\19.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\20.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Country Squire Florist</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\20.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\21.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Concord Fabric Single</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\21.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\22.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\23.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\24.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Gpoly and Bark Eames Style</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\24.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\25.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Vortex and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\26.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\27.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Bark and Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\28.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\29.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Electronic and Bark Vortex</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #electronics End Here -->
      </div>
      <!-- Tab Content End -->
    </div>
    <!-- main-product-tab-area-->
  </div>
  <!-- Container End -->
</div>
<!-- Thuong hieu Area End Here -->


<!-- Danh muc Products Area Start Here -->
<div class="arrivals-product pb-85 pb-sm-45">
  <div class="container">
    <div class="main-product-tab-area">
      <div class="tab-menu mb-25">
        <div class="section-ttitle">
          <h2>Danh Mục</h2>
        </div>
        <!-- Nav tabs -->
        <ul class="nav tabs-area" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#fshion">Fashion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#beauty">Beauty</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#electronics">Sport/Outdoor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#kids">Living</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#beauty">Food</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#kids">Baby/Kids</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#electronics">Electronics </a>
          </li>
        </ul>

      </div>

      <!-- Tab Contetn Start -->
      <div class="tab-content">
        <div id="fshion" class="tab-pane fade">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\2.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Work Lamp Silver Proin</a></h4>
                    <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                    <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\3.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\4.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Gpoly and Bark Eames Style</a></h4>
                    <p><span class="price">$150.30</span><del class="prev-price">$175.50</del></p>
                    <div class="label-product l_sale">10<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\5.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\6.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\8.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\9.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Eames and Bark Style</a></h4>
                    <p><span class="price">$180.45</span><del class="prev-price">$200.50</del></p>
                    <div class="label-product l_sale">18<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\11.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\12.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Eames and Vortex Side</a></h4>
                    <p><span class="price">$160.45</span><del class="prev-price">$190.50</del></p>
                    <div class="label-product l_sale">12<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\15.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\16.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Bark Vortex Side Eames</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\13.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\14.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\7.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #fshion End Here -->
        <div id="kids" class="tab-pane fade show active">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\42.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\43.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Utensils and Knives Block</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\40.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\41.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Terra Xpress HE Cooking </a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$300.50</del></p>
                    <div class="label-product l_sale">25<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\39.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\38.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Robert Welch Knife Block</a></h4>
                    <p><span class="price">$100.45</span><del class="prev-price">$150.50</del></p>
                    <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\36.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\37.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$90.50</span><del class="prev-price">$120.50</del></p>
                    <div class="label-product l_sale">15<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\35.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\36.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Bark and Vortex Side</a></h4>
                    <p><span class="price">$69.20</span><del class="prev-price">$145.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\34.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\35.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Compary and Bark Vortex Shewe</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\32.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\33.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">kallery kids weare</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\7.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #fshion End Here -->
        <div id="beauty" class="tab-pane fade">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\43.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\42.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\41.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\39.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\5.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\6.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\9.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\10.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\11.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\12.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\3.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\4.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\43.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\42.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\1.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\7.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #beauty End Here -->
        <div id="electronics" class="tab-pane fade">
          <!-- Arrivals Product Activation Start Here -->
          <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\17.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\18.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Flos Chasen S2 Suspension</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\19.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\20.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Country Squire Florist</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\20.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\21.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Concord Fabric Single</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\21.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\22.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\23.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\24.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Gpoly and Bark Eames Style</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\24.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\25.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Vortex and Bark Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
            <!-- Double Product Start -->
            <div class="double-product">
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\26.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\27.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Bark and Vortex Side</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
              <!-- Single Product Start -->
              <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                  <a href="product.html">
                    <img class="primary-img" src="assets\img\products\28.jpg" alt="single-product">
                    <img class="secondary-img" src="assets\img\products\29.jpg" alt="single-product">
                  </a>
                  <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                  <div class="pro-info">
                    <h4><a href="product.html">Electronic and Bark Vortex</a></h4>
                    <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                    <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                  </div>
                  <div class="pro-actions">
                    <div class="actions-primary">
                      <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                    </div>
                    <div class="actions-secondary">
                      <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To
                          Compare</span></a>
                      <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to
                          WishList</span></a>
                    </div>
                  </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
              </div>
              <!-- Single Product End -->
            </div>
            <!-- Double Product End -->
          </div>
          <!-- Arrivals Product Activation End Here -->
        </div>
        <!-- #electronics End Here -->
      </div>
      <!-- Tab Content End -->
    </div>
    <!-- main-product-tab-area-->
  </div>
  <!-- Container End -->
</div>
<!-- Danh muc Products Area End Here -->


<!-- San pham moi -->
<div class="like-product pt-50 off-white-bg pt-sm-50 pb-sm-55 ">
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
                <a href="product.html">
                  <img class="primary-img" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                  <img class="secondary-img" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="single-product">
                </a>
                <a href="#" class="quick_view" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="lnr lnr-magnifier"></i></a>
              </div>
              <!-- Product Image End -->
              <!-- Product Content Start -->
              <div class="pro-content">
                <div class="pro-info">
                  <h4><a href="product.html"><?php echo $result["productName"] ?></a></h4>
                  <p><span class="price"><?php echo $fm->formatMoney($result["productPrice"]); ?></span><del class="prev-price"></del></p>
                  <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                </div>
                <div class="pro-actions">
                  <div class="actions-primary">
                    <a href="cart.html" title="Add to Cart"> + Add To Cart</a>
                  </div>
                  <div class="actions-secondary">
                    <a href="compare.html" title="Compare"><i class="lnr lnr-sync"></i> <span>Add To Compare</span></a>
                    <a href="wishlist.html" title="WishList"><i class="lnr lnr-heart"></i> <span>Add to WishList</span></a>
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
<div class="main-brand-banner off-white-bg  pb-100 pb-sm-60 pt-sm-55" style="padding-top: 60px;">
  <div class="container">
    <div class="section-ttitle mb-30 text-center">
      <h2 class="section-ttitle2 mb-30" style="font-size: 40px;">Sản Phẩm Mới</h2>
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
          <div class="single-brand">
            <a href="#"><img class="img" src="assets\img\brand\1.jpg" alt="brand-image"></a>
            <a href="#"><img src="assets\img\brand\2.jpg" alt="brand-image"></a>
            <a href="#"><img src="assets\img\brand\3.jpg" alt="brand-image"></a>
          </div>

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


<div class="big-banner pb-100 pb-sm-60">
  <div class="container big-banner-box">
    <div class="col-img">
      <a href="#">
        <img src="assets\img\banner\5.jpg" alt="">
      </a>
    </div>
    <div class="col-img">
      <a href="#">
        <img src="assets\img\banner\h1-banner3.jpg" alt="">
      </a>
    </div>
  </div>
  <!-- Container End -->
</div>

<?php include_once "inc/footer.php"; ?>