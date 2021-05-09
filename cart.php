<?php include_once "inc/header.php"; ?>

<?php
if (isset($_GET["deleteID"])) {
  $cartID = $_GET["deleteID"];
  $deleteCart = $cart->deleteCart($cartID);
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateCart"])) {
  $cartID = $_POST["cartID"];
  $productQuantity = $_POST["productQuantity"];
  $updateQuantity = $cart->updateQuantityCart($cartID, $productQuantity);
}

?>

</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="cart.php">Giỏ hàng</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Cart Main Area Start -->
<div class="cart-main-area ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <!-- Form Start -->
        <form action="" method="POST">
          <!-- Table Content Start -->
          <div class="table-content table-responsive mb-45">
            <table>
              <thead>
                <tr>
                  <th class="product-thumbnail">Hình ảnh</th>
                  <th class="product-name">Tên sản phẩm</th>
                  <th class="product-price">Giá</th>
                  <th class="product-quantity">Số lượng</th>
                  <th class="product-subtotal">Tổng tiền</th>
                  <th class="product-remove">Xóa</th>
                </tr>

              </thead>
              <tbody>

                <?php
                $getCart = $cart->getCart();
                if ($getCart) {
                  $i = 0;
                  $total = 0;
                  while ($result = $getCart->fetch_assoc()) {
                    $i++;
                    $total += $result["productPrice"] * $result["productQuantity"];
                ?>
                    <tr>
                      <td class="product-thumbnail">
                        <a href="product.php?productID=<?php echo $result["productID"] ?>"><img style="height: 102px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="cart-image"></a>
                      </td>
                      <td class="product-name"><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></td>
                      <td class="product-price"><span class="amount"><?php echo $fm->formatMoney($result["productPrice"]) ?></span></td>
                      <td class="product-quantity">
                        <form action="" method="POST">
                          <input type="hidden" name="cartID" value="<?php echo $result["cartID"] ?>" />
                          <input name="productQuantity" type="number" min="1" value="<?php echo $result["productQuantity"] ?>">
                          <input type="submit" name="updateCart" value="Update" class="btn btn-primary btn-sm">
                        </form>
                      </td>
                      <td class="product-subtotal"><?php echo $fm->formatMoney($result["productPrice"] * $result["productQuantity"]) ?></td>
                      <td class="product-remove"> <a href="cart.php?deleteID=<?php echo $result["cartID"] ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                    </tr>
                <?php   }
                } ?>
              </tbody>
            </table>
          </div>
          <!-- Table Content Start -->
          <div class="row">
            <!-- Cart Button Start -->
            <div class="col-md-8 col-sm-12">
              <div class="buttons-cart">
                <a href="index.php">Tiếp tục mua sắm</a>
              </div>
            </div>
            <!-- Cart Button Start -->
            <!-- Cart Totals Start -->
            <div class="col-md-4 col-sm-12">
              <div class="cart_totals float-md-right text-md-right">
                <h2>Tổng tiền</h2>
                <br>
                <table class="float-md-right">
                  <?php
                  if ($getCart) {
                  ?>
                    <tbody>
                      <!-- <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td><span class="amount"><?php echo $fm->formatMoney($total) ?></span></td>
                      </tr> -->
                      <tr class="order-total">
                        <th>Tổng tiền</th>
                        <td>
                          <strong><span class="amount"><?php echo $fm->formatMoney($total) ?></span></strong>
                        </td>
                      </tr>
                    </tbody>
                  <?php }  ?>
                </table>
                <div class="wc-proceed-to-checkout">
                  <a href="order.php">Đặt hàng</a>
                </div>
              </div>
            </div>
            <!-- Cart Totals End -->
          </div>
          <!-- Row End -->
        </form>
        <!-- Form End -->
      </div>
    </div>
    <!-- Row End -->
  </div>
</div>
<!-- Cart Main Area End -->
<?php include_once "inc/footer.php"; ?>