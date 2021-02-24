<?php
ob_start();
include_once "lib/session.php";
Session::init();
?>

<?php
include_once "classes/category.php";
$cat = new category();

include_once "classes/brand.php";
$brand = new brand();

include_once "classes/product.php";
$product = new product();

include_once "classes/slider.php";
$slider = new slider();

include_once "classes/cart.php";
$cart = new cart();

include_once "classes/order.php";
$order = new order();

include_once "classes/wishlist.php";
$wish = new wishlist();

include_once "classes/user.php";
$cus = new user();

include_once "helpers/format.php";
$fm = new format();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {
	$loginCustomer = $cus->loginCustomer($_POST);
}

if (isset($_GET["action"]) && $_GET["action"] == "logout") {
	Session::logoutUser();
}
?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>

<!doctype html>
<html lang="vn">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Website bán hàng</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicons -->
	<link rel="shortcut icon" href="assets\img\favicon.ico">
	<!-- Fontawesome css -->
	<link rel="stylesheet" href="assets\css\font-awesome.min.css">
	<!-- Ionicons css -->
	<link rel="stylesheet" href="assets\css\ionicons.min.css">
	<!-- linearicons css -->
	<link rel="stylesheet" href="assets\css\linearicons.css">
	<link rel="stylesheet" href="assets\css\css.css">
	<!-- Nice select css -->
	<link rel="stylesheet" href="assets\css\nice-select.css">
	<!-- Jquery fancybox css -->
	<link rel="stylesheet" href="assets\css\jquery.fancybox.css">
	<!-- Jquery ui price slider css -->
	<link rel="stylesheet" href="assets\css\jquery-ui.min.css">
	<!-- Meanmenu css -->
	<link rel="stylesheet" href="assets\css\meanmenu.min.css">
	<!-- Nivo slider css -->
	<link rel="stylesheet" href="assets\css\nivo-slider.css">
	<!-- Owl carousel css -->
	<link rel="stylesheet" href="assets\css\owl.carousel.min.css">
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="assets\css\bootstrap.min.css">
	<!-- Custom css -->
	<link rel="stylesheet" href="assets\css\default.css">
	<!-- Main css -->
	<link rel="stylesheet" href="assets\css\style.css?v=<?php echo time(); ?>">
	<!-- Responsive css -->
	<link rel="stylesheet" href="assets\css\responsive.css">
	<!-- Modernizer js -->
	<link rel="stylesheet" href="assets\css\custom-style.css?v=<?php echo time(); ?>">

</head>
<!-- hello -->

<body>
	<!-- Main Wrapper Start Here -->
	<div class="wrapper">

		<div class="wrap-signin-form">
			<form class="login-form" autocomplete="off" action="" method="POST">
				<div class="btn-signin-hide"><i class="fa fa-times" aria-hidden="true"></i></div>
				<img class="avatar-login" src="assets/img/avatar.svg" alt="">
				<h4 class="text-login-form">Đăng nhập</h4>
				<input class="custom-in" type="text" name="username" placeholder="Tên người dùng" />
				<div class="input-icon">
					<input class="custom-in" type="password" name="password" placeholder="Mật khẩu" />
					<i class="fa fa-eye show-password"></i>
				</div>
				<a href="#" class="forgot">Quên mật khẩu?</a>
				<button type="submit" name="login" class="btn-custom">Đăng Nhập</button>
			</form>
		</div>

		<div class="wrap-signup-form">
			<form class="login-form" autocomplete="off" action="" method="POST">
				<div class="btn-signup-hide"><i class="fa fa-times" aria-hidden="true"></i></div>
				<img class="avatar-login" src="assets/img/avatar.svg" alt="">
				<h4 class="text-login-form" style="margin-bottom: 35px;">Thay đổi mật khẩu</h4>

				<div class="input-icon">
					<input class="custom-in" type="password" name="oldPassword" placeholder="Mật khẩu cũ" />
				</div>
				<div class="input-icon">
					<input class="custom-in" type="password" name="newPassword" placeholder="Mật khẩu mới" />
				</div>
				<div class="input-icon">
					<input class="custom-in" type="password" name="reNewPassword" placeholder="Nhập lại mật khẩu" />
				</div>

				<a href="#" class="forgot">Quên mật khẩu?</a>
				<button type="submit" name="change-password" class="btn-custom">Cập Nhập</button>
			</form>
		</div>

		<!-- Newsletter Popup Start -->
		<div class="popup_wrapper">
			<div class="test">
				<span class="popup_off">Close</span>
				<div class="subscribe_area text-center mt-60">
					<h2>Newsletter</h2>
					<p>Subscribe to the Truemart mailing list to receive updates on new arrivals, special offers and other
						discount information.</p>
					<div class="subscribe-form-group">
						<form action="#">
							<input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
							<button type="submit">subscribe</button>
						</form>
					</div>
					<div class="subscribe-bottom mt-15">
						<input type="checkbox" id="newsletter-permission">
						<label for="newsletter-permission">Don't show this popup again</label>
					</div>
				</div>
			</div>
		</div>
		<!-- Newsletter Popup End -->

		<!-- Main Header Area Start Here -->
		<header>
			<!-- Header Middle Start Here -->
			<div class="header-middle ptb-15">
				<div class="container">
					<div class="row align-items-center no-gutters">
						<div class="col-lg-3 col-md-12">
							<div class="logo mb-all-30">
								<a href="index.php"><img src="assets\img\logo\logo.png" alt="logo-image"></a>
							</div>
						</div>
						<!-- Categorie Search Box Start Here -->
						<div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
							<div class="categorie-search-box">
								<form action="#">
									<div class="form-group">
										<select class="bootstrap-select" name="poscats">
											<option value="0">Danh mục</option>
											<?php
											$getCat = $cat->getCategory();
											if ($getCat) {
												while ($resultCat = $getCat->fetch_assoc()) {
											?>
													<option value="0"><?php echo $resultCat["catName"] ?></option>
											<?php
												}
											}
											?>
										</select>
									</div>
									<input type="text" name="search" placeholder="Nhập từ khóa để tìm kiếm...">
									<button><i class="lnr lnr-magnifier"></i></button>
								</form>
							</div>
						</div>
						<!-- Categorie Search Box End Here -->
						<!-- Cart Box Start Here -->
						<div class="col-lg-4 col-md-12">
							<div class="cart-box mt-all-30">

								<ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
									<li>
										<a href="cart.php"><i class="lnr lnr-cart"></i><span class="my-cart"><span class="total-pro">
													<?php
													$countCart = $cart->getCountCart();
													if ($countCart) {
														echo $countCart["countCart"];
													} else {
														echo "0";
													}
													?>
												</span><span>Giỏ hàng</span></span>
										</a>
										<ul class="ht-dropdown cart-box-width">
											<?php
											$getCart = $cart->getCart();
											if ($getCart) {
											?>
												<li>
													<!-- Cart Box Start -->
													<?php
													$total = 0;
													while ($result = $getCart->fetch_assoc()) {
														$total += $result["productPrice"] * $result["productQuantity"];
													?>
														<div class="single-cart-box">
															<div class="cart-img">
																<a href="#"><img style="height: 78px; width: 78px; object-fit: cover;" src="admin/uploads/products/<?php echo $result["productImage"] ?>" alt="cart-image"></a>
																<span class="pro-quantity"><?php echo $result["productQuantity"] ?></span>
															</div>
															<div class="cart-content">
																<h6><a href="product.php"><?php echo $result["productName"] ?></a></h6>
																<span class="cart-price"><?php echo $result["productPrice"] ?></span>
																<span></span>
																<span></span>
															</div>
															<a class="del-icone" href="cart.php?deleteID=<?php echo $result["cartID"] ?>"><i class="ion-close"></i></a>
														</div>
														<!-- Cart Box End -->
													<?php
													}
													?>
													<div class="cart-footer">
														<ul class="price-content">
															<li>Subtotal <span><?php echo $total ?></span></li>
															<li>Shipping <span><?php echo $total ?></span></li>
															<li>Taxes <span><?php echo $total ?></span></li>
															<li>Total <span><?php echo $total ?></span></li>
														</ul>
														<div class="cart-actions text-center">
															<a class="cart-checkout" href="checkout.php">Checkout</a>
														</div>
													</div>
													<!-- Cart Footer Inner End -->
												</li>
											<?php }  ?>
										</ul>
									</li>
									<li><a href="wishlist.php"><i class="lnr lnr-heart"></i><span class="my-cart"><span>Yêu</span><span>thích
													(<?php
														$countWishlist = $wish->getCountWishlist();
														if ($countWishlist) {
															echo $countWishlist["countWishlist"];
														} else {
															echo "0";
														}
														?>)</span></span></a>
									</li>
									<li>
										<?php
										if (Session::isUserLogin()) {
										?>
											<div class="logout-user">
												<img class="avatar-user align-middle" src="uploads/avatars/<?php echo Session::get("userImage") ?>" alt="">
												<span class="fullname-user align-middle"><?php echo Session::get("userFullName"); ?> <i style="line-height: inherit; font-size: inherit;" class="fa fa-angle-down"></i></span>
												<ul class="ht-dropdown dropdown-style-two" style="width: 200px;">
													<li class="list-group-item list-group-item-action" style="border: none;"><a href="?action=logout" style="color: #212529;">Đăng xuất</a></li>
													<li class="list-group-item list-group-item-action btn-signup-show" style="border: none; color: #212529;"> Thay đổi mật khẩu</li>
													<li class="list-group-item list-group-item-action" style="border: none;"><a href="" style="color: #212529;">Thông tin tài khoản</a></li>
												</ul>
											</div>
										<?php } else { ?>
											<a href="#" class="align-middle">
												<i class="lnr lnr-user"></i>
												<div class="my-cart align-middle">
													<a href="signup.php" style="font-weight: bold;">Đăng ký</a>
													<p><strong class="btn-signin-show">Đăng nhập</strong></p>
												</div>
											</a>
										<?php } ?>
									</li>
								</ul>


							</div>
						</div>
						<!-- Cart Box End Here -->
					</div>
					<!-- Row End -->
				</div>
				<!-- Container End -->
			</div>
			<!-- Header Middle End Here -->
			<!-- Header Bottom Start Here -->
			<div class="header-bottom  header-sticky">
				<div class="container">
					<div class="row align-items-center">

						<div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
							<span class="categorie-title">Danh mục</span>
						</div>

						<div class="col-xl-6 col-lg-8 col-md-12 ">
							<nav class="d-none d-lg-block">
								<ul class="header-bottom-list d-flex">
									<li class="active"><a href="index.php">Trang chủ</a>
									<li><a href="cart.php">Giỏ hàng</a>
									<li><a href="wishlist.php">Yêu thích</a></li>
									<li><a href="compare.php">So sánh</a></li>

									<li><a>Đơn hàng<i class="fa fa-angle-down"></i></a>
										<!-- Home Version Dropdown Start -->
										<ul class="ht-dropdown dropdown-style-two">
											<li><a href="order.php">Đặt hàng</a></li>
											<li><a href="orderdetails.php">Chi tiết đơn hàng</a></li>
										</ul>
										<!-- Home Version Dropdown End -->
									</li>

									<li><a href="shop.php">Thêm<i class="fa fa-angle-down"></i></a>
										<!-- Home Version Dropdown Start -->
										<ul class="ht-dropdown dropdown-style-two">
											<li><a href="product.php">Thông tin tài khoản</a></li>
										</ul>
										<!-- Home Version Dropdown End -->
									</li>
								</ul>
							</nav>
							<div class="mobile-menu d-block d-lg-none">
								<nav>
									<ul>
										<li><a href="index.php">home</a>
											<!-- Home Version Dropdown Start -->
											<ul>
												<li><a href="index.php">Home Version 1</a></li>
											</ul>
											<!-- Home Version Dropdown End -->
										</li>
										<li><a href="shop.php">shop</a>
											<!-- Mobile Menu Dropdown Start -->
											<ul>
												<li><a href="product.php">product details</a></li>
												<li><a href="compare.php">compare</a></li>
												<li><a href="cart.php">cart</a></li>
												<li><a href="checkout.php">checkout</a></li>
												<li><a href="wishlist.php">wishlist</a></li>
											</ul>
											<!-- Mobile Menu Dropdown End -->
										</li>
										<li><a href="blog.php">Blog</a>
											<!-- Mobile Menu Dropdown Start -->
											<ul>
												<li><a href="single-blog.php">blog details</a></li>
											</ul>
											<!-- Mobile Menu Dropdown End -->
										</li>
										<li><a href="#">pages</a>
											<!-- Mobile Menu Dropdown Start -->
											<ul>
												<li><a href="register.php">register</a></li>
												<li><a href="login.php">sign in</a></li>
												<li><a href="forgot-password.php">forgot password</a></li>
												<li><a href="404.php">404</a></li>
											</ul>
											<!-- Mobile Menu Dropdown End -->
										</li>
										<li><a href="about.php">about us</a></li>
										<li><a href="contact.php">contact us</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-xl-3 col-lg-8 col-md-12 hide-cart-info">
							<div class="float-right">
								<a href="cart.php" class="align-middle">
									<span class="my-cart align-middle">
										<?php
										$countCart = $cart->getCountCart();
										if ($countCart) {
											echo $countCart["countCart"];
										} else {
											echo "0";
										}
										?>
									</span>
									<i class="lnr lnr-cart align-middle"></i>
								</a>
								<a href="wishlist.php" class="align-middle">
									<span class="my-cart align-middle">
										<?php
										$countWishlist = $wish->getCountWishlist();
										if ($countWishlist) {
											echo $countWishlist["countWishlist"];
										} else {
											echo "0";
										}
										?>
									</span>
									<i class="lnr lnr-heart align-middle"></i>
								</a>
								<a href="" class="align-middle">
									<?php
									if (Session::isUserLogin()) {
									?>
										<img class="info-avatar" src="uploads/avatars/<?php echo Session::get("userImage") ?>" alt="" />
										<strong class="my-cart align-middle" style="margin-left: 2px;"><?php echo Session::get("userFullName"); ?></strong>
									<?php } ?>
								</a>
							</div>
						</div>
					</div>
					<!-- Row End -->
				</div>
				<!-- Container End -->
			</div>
			<!-- Header Bottom End Here -->


			<!-- Mobile Vertical Menu Start Here -->
			<div class="container d-block d-lg-none">
				<div class="vertical-menu mt-30">
					<span class="categorie-title mobile-categorei-menu">Shop by Categories </span>
					<nav>
						<div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
							<ul>
								<?php
								$getCat = $cat->getCategory();
								if ($getCat) {
									while ($resultCat = $getCat->fetch_assoc()) {
								?>
										<li><a href="#"><?php echo $resultCat["catName"] ?></a></li>
								<?php
									}
								}
								?>
							</ul>
						</div>
						<!-- category-menu-end -->
					</nav>
				</div>
			</div>
			<!-- Mobile Vertical Menu Start End -->
		</header>
		<!-- Main Header Area End Here
    <!- Categorie Menu & Slider Area Start Here -->
		<div class="main-page-banner off-white-bg home-3">
			<div class="container">
				<div class="row">
					<!-- Vertical Menu Start Here -->
					<div class="col-xl-3 col-lg-4 d-none d-lg-block">
						<div class="vertical-menu mb-all-30">
							<nav>
								<ul class="vertical-menu-list">
									<?php
									$getCat = $cat->getCategory();
									if ($getCat) {
										while ($resultCat = $getCat->fetch_assoc()) {
									?>
											<li>
												<a href="shop.php"><span><img src="assets\img\vertical-menu\10.png" alt="menu-icon"></span><?php echo $resultCat["catName"] ?></a>
											</li>
									<?php
										}
									}
									?>

									<!-- <li id="cate-toggle" class="category-menu v-cat-menu">
										<ul>
											<li class="has-sub"><a href="#">More Categories</a>
												<ul class="category-sub">
													<li><a href="shop.php"><span><img src="assets\img\vertical-menu\11.png" alt="menu-icon"></span>Accessories</a></li>
												</ul>
											</li>
										</ul>
									</li> -->

								</ul>
							</nav>
						</div>
					</div>
					<!-- Vertical Menu End Here -->
				</div>
				<!-- Row End -->
			</div>
			<!-- Container End -->