<?php include_once "inc/header.php"; ?>

<?php
if (isset($_GET["deleteID"])) {
  $wishlistID = $_GET["deleteID"];
  $deleteWishlist = $wish->deleteWishlist($wishlistID);
}

if (isset($_GET["productID"]) && $_GET["productID"] != NULL) {
  $productID = $_GET["productID"];
  $insertCart = $cart->insertCart($productID, 1);
}
?>

</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="wishlist.php">Wishlist</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Wish List Start -->
<div class="cart-main-area wish-list ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- Form Start -->
        <form action="#">
          <!-- Table Content Start -->
          <div class="table-content table-responsive">
            <table>
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Unit Price</th>
                  <th class="product-quantity">Stock Status</th>
                  <th class="product-subtotal">add to cart</th>
                  <th class="product-remove">Remove</th>
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
                      <td class="product-stock-status"><span>in stock</span></td>
                      <td class="product-add-to-cart"><a href="wishlist.php?productID=<?php echo $result["productID"] ?>">Add to cart</a></td>
                      <td class="product-remove"> <a href="wishlist.php?deleteID=<?php echo $result["wishlistID"] ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- Table Content Start -->
        </form>
        <!-- Form End -->
      </div>
    </div>
    <!-- Row End -->
  </div>
</div>
<!-- Wish List End -->
<?php include_once "inc/footer.php"; ?>