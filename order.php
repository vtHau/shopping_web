<?php include_once "inc/header.php"; ?>
<?php Session::checkUserLogin() ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["order"])) {
  $insertOrder = $order->insertOrder();

  if ($insertOrder) {
    $deleteAllCart = $cart->deleteAllCart();
  }
}
?>

</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="order.php">Đặt hàng</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Error 404 Area Start -->
<div class="error404-area ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="box-both">
          <table class="table " style=" width: 100%;">
            <thead class="thead-light">
              <tr>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng tiền</th>
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
                    <td class="align-middle text-center" scope="row"><a href="product.php?productID=<?php echo $result["productID"] ?>"><img style="border-radius: 10px; height: 50px; width: 50px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="cart-image"></a></td>
                    <td class="align-middle text-center"><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></td>
                    <td class="align-middle text-center"><?php echo $result["productQuantity"] ?></td>
                    <td class="align-middle text-center"><?php echo $result["productPrice"] ?></td>
                    <td class="align-middle text-center"><?php echo $result["productPrice"] * $result["productQuantity"] ?></td>
                  </tr>
              <?php   }
              } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
    <div class="row mt-20">
      <div class="col-md-12">
        <div class="box-both text-right">
          <p style="font-weight: bold;">Tổng tiền:
            <?php if (isset($total)) {
              echo $fm->formatMoney($total);
            } else echo "0 VND"  ?></p>
        </div>
      </div>
    </div>
    <div class="row mt-20">
      <div class="col-md-12">
        <form action="" method="POST">
          <div class="box-both">
            <div class="form-group" style="padding: 40px; padding-bottom: 4px;">
              <?php
              $userID = Session::get("userID");
              $getCustomer = $cus->getCustomer($userID);

              if ($getCustomer) {
                while ($result = $getCustomer->fetch_assoc()) {
              ?>
                  <p style="margin-bottom: 40px; font-size: 30px; text-transform: uppercase;" class="text-center">Thông tin khách hàng</p>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Họ tên</label>
                    <input type="text" value="<?php echo $result["userFullName"] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Họ tên người nhận">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Số điện thoại</label>
                    <input type="text" value="<?php echo $result["userPhone"] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Số điện thoại người nhận">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ghi chú</label>
                    <input type="text" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập ghi chú nếu có">
                    <small id="emailHelp" class="form-text text-muted"></small>
                  </div>

              <?php
                }
              }
              ?>
            </div>
          </div>
          <div class="box-both mt-20 back-none">
            <div class="form-group text-center mt-20">
              <input type="submit" name="order" value="Đặt hàng" class="btn btn-primary order-btn" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Error 404 Area End -->
<script type="text/javascript">
  document.title = "Đặt hàng";
</script>
<?php include_once "inc/footer.php"; ?>