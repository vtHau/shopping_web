<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<div class="app-main">
	<?php include_once "./inc/slidebar.php" ?>

	<div class="app-main__outer">
		<div class="app-main__inner">
			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-car icon-gradient bg-mean-fruit">
							</i>
						</div>
						<div>
							Tổng quan
							<div class="page-title-subheading">
								Thông tin tổng quan
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title text-center mt-3 pb-4" style="font-size: 25px; border-bottom: 1px solid rgba(26,54,126,0.125);">
						<i class="fas fa-user-cog" style="font-size: 40px;"></i>
						<br>
						Thống kê tổng quan
					</h5>
					<div class="row mt-5 mb-4">
						<div class="col-md-3 text-center">
							<div class="card-device more-feature float-right">
								<div class="card-device-title">
									Danh mục
									<br />
									<?php
									$countCategory = $cat->countCategory();
									if ($countCategory) {
										echo $countCategory["countCategory"];
									} else {
										echo "0";
									}
									?>
								</div>
							</div>
						</div>

						<div class="col-md-3 text-center">
							<div class="card-device more-feature">
								<div class="card-device-title">
									Thương hiệu
									<br />
									<?php
									$countBrand = $brand->countBrand();
									if ($countBrand) {
										echo $countBrand["countBrand"];
									} else {
										echo "0";
									}
									?>
								</div>
							</div>
						</div>

						<div class="col-md-3 text-center">
							<div class="card-device more-feature">
								<div class="card-device-title">
									Sản phẩm
									<br />
									<?php
									$countProduct = $product->countProduct();
									if ($countProduct) {
										echo $countProduct["countProduct"];
									} else {
										echo "0";
									}
									?>
								</div>
							</div>
						</div>

						<div class="col-md-3 text-center">
							<div class="card-device more-feature float-left">
								<div class="card-device-title">
									Slider
									<br />
									<?php
									$countSlider = $slider->countSlider();
									if ($countSlider) {
										echo $countSlider["countSlider"];
									} else {
										echo "0";
									}
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="row mt-5 mb-4">
						<div class="col-md-3 text-center">
							<div class="card-device more-feature float-right">
								<div class="card-device-title">
									Đánh giá
									<br />
									<?php
									$countReview = $review->countReview();
									if ($countReview) {
										echo $countReview["countReview"];
									} else {
										echo "0";
									}
									?>
								</div>
							</div>
						</div>

						<div class="col-md-3 text-center">
							<div class="card-device more-feature">
								<div class="card-device-title">
									Đơn hàng
									<br />
									<?php
									$countOrder = $order->countOrder();
									if ($countOrder) {
										echo $countOrder["countOrder"];
									} else {
										echo "0";
									}
									?>
								</div>
							</div>
						</div>

						<div class="col-md-3 text-center">
							<div class="card-device more-feature">
								<div class="card-device-title">
									Người dùng
									<br />
									<?php
									$countUser = $user->countUser();
									if ($countUser) {
										echo $countUser["countUser"];
									} else {
										echo "0";
									}
									?>
								</div>
							</div>
						</div>

						<div class="col-md-3 text-center">
							<div class="card-device more-feature float-left">
								<div class="card-device-title">
									Lượt truy cập
									<br />
									<?php
									$getCountVisitor = $visitor->getCountVisitor();
									if ($getCountVisitor) {
										$result = $getCountVisitor->fetch_assoc();
										echo $result["quantity"];
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>