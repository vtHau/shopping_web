<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<div class="app-main">
	<!-- add slidebar -->
	<?php include_once "./inc/slidebar.php" ?>

	<div class="app-main__outer">
		<div class="app-main__inner">
			<div class="app-page-title">
				<!-- content -->
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-car icon-gradient bg-mean-fruit">
							</i>
						</div>
						<div>Quản lí website
							<div class="page-title-subheading">Chào mừng bạn đến với trang quản trị website
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content">
						<div class="widget-content-outer">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="widget-heading">Danh mục</div>
									<div class="widget-subheading">Tổng số danh mục</div>
								</div>
								<div class="widget-content-right">
									<div class="widget-numbers text-success">
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content">
						<div class="widget-content-outer">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="widget-heading">Thương hiệu</div>
									<div class="widget-subheading">Tổng số thương hiệu</div>
								</div>
								<div class="widget-content-right">
									<div class="widget-numbers text-warning">
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xl-4">
					<div class="card mb-3 widget-content">
						<div class="widget-content-outer">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="widget-heading">Sản phẩm</div>
									<div class="widget-subheading">Tổng số sản phẩm</div>
								</div>
								<div class="widget-content-right">
									<div class="widget-numbers text-danger">
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
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>