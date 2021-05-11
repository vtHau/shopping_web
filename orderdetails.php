<?php include_once "inc/header.php"; ?>
<?php Session::checkUserLogin() ?>

<?php
if (isset($_GET["deleteID"])) {
  $orderID = $_GET["deleteID"];
  $deleteOrderInUser = $order->deleteOrderInUser($orderID);
}

if (isset($_GET["received"])) {
  $orderID = $_GET["received"];
  $received = $order->receivedOrderInUser($orderID);
}
?>

</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="orderdetails.php">Chi tiết đơn hàng</a></li>
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
          <table class="table" style=" width: 100%;">
            <thead class="thead-light">
              <tr>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Tính năng</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $getOrder = $order->getOrderInUser();
              if ($getOrder) {
                $i = 0;
                $total = 0;
                while ($result = $getOrder->fetch_assoc()) {
                  $i++;
                  $total += $result["productPrice"] * $result["productQuantity"];
              ?>
                  <tr>
                    <td class="align-middle text-center" scope="row"><a href="product.php?productID=<?php echo $result["productID"] ?>"><img style="border-radius: 50%; height: 50px; width: 50px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="cart-image"></a></td>
                    <td class="align-middle text-center"><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></td>
                    <td class="align-middle text-center"><?php echo $result["productQuantity"] ?></td>
                    <td class="align-middle text-center"><?php echo $result["productPrice"] ?></td>
                    <td class="align-middle text-center"><?php echo $result["productPrice"] * $result["productQuantity"] ?></td>
                    <td class="align-middle text-center"><?php echo $result["timeOrder"] ?></td>
                    <td class="align-middle text-center" style="font-weight: bold;">
                      <?php
                      if ($result["statusOrder"] == "0") {
                        echo "Chờ xác nhận";
                      } elseif ($result["statusOrder"] == "1") {
                        echo "Đã xác nhận";
                      } elseif ($result["statusOrder"] == "2") {
                        echo "Đang giao";
                      } elseif ($result["statusOrder"] == "3") {
                        echo "Hoàn tất";
                      }
                      ?>
                    </td>

                    <td disabled class="align-middle text-center">
                      <?php
                      if ($result["statusOrder"] == "2") {
                      ?>
                        <a style="font-weight: bold;" href=" orderdetails.php?received=<?php echo $result["orderID"] ?>">Đã nhận hàng</a>
                      <?php } elseif ($result["statusOrder"] == "3") { ?>
                        <a href="orderdetails.php?deleteID=<?php echo $result["orderID"] ?>"> <i class="fa fa-times" style="font-size: 20px; color: red;" aria-hidden="true"> </i> </a>
                      <?php } else {
                        echo "N/A";
                      } ?>
                    </td>

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
  </div>
</div>
</div>
<!-- Error 404 Area End -->
<?php include_once "inc/footer.php"; ?>