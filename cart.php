<?php include_once "inc/header.php"; ?>

<?php
if (isset($_GET["deleteID"])) {
  $cartID = $_GET["deleteID"];
  $deleteCart = $cart->deleteCart($cartID);
}
?>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="cart.php">Giỏ hàng</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="cart-main-area ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <form action="" method="POST">
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
                        <a href="product.php?productID=<?php echo $result["productID"] ?>"><img style="height: 102px; object-fit: cover; border-radius: 10px;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="cart-image"></a>
                      </td>
                      <td class="product-name"><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></td>
                      <td class="product-price"><span class="amount"><?php echo $fm->formatMoney($result["productPrice"]) ?></span></td>
                      <td class="product-quantity">
                        <div>
                          <input name="productQuantity" class="product-quantity-update" data-productid="<?php echo $result["cartID"] ?>" type="number" min="1" value="<?php echo $result["productQuantity"] ?>">
                        </div>
                      </td>
                      <td class="product-subtotal"><?php echo $fm->formatMoney($result["productPrice"] * $result["productQuantity"]) ?></td>
                      <td class="product-remove"> <a href="cart.php?deleteID=<?php echo $result["cartID"] ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                    </tr>
                <?php   }
                } ?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-8 col-sm-12">
              <div class="buttons-cart">
                <a href="index.php">Tiếp tục mua sắm</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-12">
              <div class="cart_totals float-md-right text-md-right">
                <h2>Tổng tiền</h2>
                <br>
                <table class="float-md-right">
                  <?php
                  if ($getCart) {
                  ?>
                    <tbody>
                      <?php echo $fm->formatMoney($total) ?>
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
                  <?php
                  if (Session::isUserLogin()) {
                    echo ' <a href="order.php">Đặt hàng</a>';
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  document.title = "Giỏ hàng";
</script>
<?php include_once "inc/footer.php"; ?>