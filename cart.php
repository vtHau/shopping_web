﻿<?php include_once "inc/header.php"; ?>

<?php
if (isset($_GET["deleteID"])) {
  $cartID = $_GET["deleteID"];
  $deleteCart = $cart->deleteCart($cartID);
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateCart"])) {
  $cartID = $_POST["cartID"];
  $productQuantity = $_POST["productQuantity"];
  $updateQuantity = $cart->updateQuantityCart($cartID, $productQuantity);
  // $insertCart = $cart->insertCart($productID, $productQuantity);
}

?>

</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.html">Home</a></li>
        <li class="active"><a href="cart.html">Cart</a></li>
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
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-subtotal">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $userID = session_id();
                if (Session::isUserLogin()) {
                  $userID = Session::get("userID");
                }

                $getCartByUserID = $cart->getCartByUserID($userID);
                if ($getCartByUserID) {
                  $i = 0;
                  $total = 0;
                  while ($result = $getCartByUserID->fetch_assoc()) {
                    $i++;
                    $total += $result["productPrice"] * $result["productQuantity"];
                ?>
                    <tr>
                      <td class="product-thumbnail">
                        <a href="#"><img style="height: 102px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="cart-image"></a>
                      </td>
                      <td class="product-name"><a href="#"><?php echo $result["productName"] ?></a></td>
                      <td class="product-price"><span class="amount"><?php echo $result["productPrice"] ?></span></td>
                      <td class="product-quantity">
                        <form action="" method="POST">
                          <input type="hidden" name="cartID" value="<?php echo $result["cartID"] ?>" />
                          <input name="productQuantity" type="number" min="1" value="<?php echo $result["productQuantity"] ?>">
                          <input type="submit" name="updateCart" value="Update" class="btn btn-primary btn-sm">
                        </form>
                      </td>
                      <td class="product-subtotal"><?php echo $result["productPrice"] * $result["productQuantity"] ?></td>
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
                <a href="index.php">Continue Shopping</a>
              </div>
            </div>
            <!-- Cart Button Start -->
            <!-- Cart Totals Start -->
            <div class="col-md-4 col-sm-12">
              <div class="cart_totals float-md-right text-md-right">
                <h2>Cart Totals</h2>
                <br>
                <table class="float-md-right">
                  <?php
                  if ($getCartByUserID) {
                  ?>
                    <tbody>
                      <tr class="cart-subtotal">
                        <th>Subtotal</th>
                        <td><span class="amount"><?php echo $total ?></span></td>
                      </tr>
                      <tr class="order-total">
                        <th>Tổng tiền</th>
                        <td>
                          <strong><span class="amount"><?php echo $total ?></span></strong>
                        </td>
                      </tr>
                    </tbody>
                  <?php }  ?>
                </table>
                <div class="wc-proceed-to-checkout">
                  <a href="#">Proceed to Checkout</a>
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