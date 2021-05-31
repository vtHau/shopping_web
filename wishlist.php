<?php include_once "inc/header.php"; ?>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="wishlist.php">Yêu thích</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="cart-main-area wish-list ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <form action="#">
          <div class="table-content table-responsive">
            <table>
              <thead>
                <tr>
                  <th class="product-thumbnail">Hỉnh ảnh</th>
                  <th class="product-name">Tên sản phẩm</th>
                  <th class="product-price">Giá</th>
                  <th class="product-subtotal">Thêm vào giỏ hàng</th>
                  <th class="product-remove">Xóa</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $getWishlist = $wish->getWishlist();
                if ($getWishlist) {
                  while ($result = $getWishlist->fetch_assoc()) {
                ?>
                    <tr>
                      <td class="product-thumbnail">
                        <a href="product.php?productID=<?php echo $result["productID"] ?>"><img style="height: 102px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="cart-image"></a>
                      </td>
                      <td class="product-name"><a href="product.php?productID=<?php echo $result["productID"] ?>"><?php echo $result["productName"] ?></a></td>
                      <td class="product-price"><span class="amount"><?php echo $result["productPrice"] ?></span></td>
                      <td class="product-add-to-cart"><a class="add-cart" data-id="<?php echo $result["productID"] ?>">Add to cart</a></td>
                      <td class="product-remove"> <a><i class="fa fa-times del-love" data-id="<?php echo $result["wishlistID"] ?>" aria-hidden="true"></i></a></td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  document.title = "Sản phẩm yêu thích";
</script>
<?php include_once "inc/footer.php"; ?>