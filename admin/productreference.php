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
						<div>Sản phẩm
							<div class="page-title-subheading">
								Tham khảo sản phẩm
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title"> Tham khảo sản phẩm</h5>
					<div class="form-row text-center">
						<div class="col-md-12 mb-3 mt-2">
							<label for="validationTooltip01">Chọn thương hiệu</label>
							<select class="mb-2 form-control w-50 select-brand" style="margin: 0 auto;" name="productBrand">
								<option value="16">Samsung</option>
								<option value="15">Xiaomi</option>
								<option value="18">Apple</option>
								<option value="17">Realme</option>
							</select>
							<button class="btn btn-success get-data" style="padding-left: 35px; padding-right:35px ;" type="submit">Lấy dữ liệu</button>
						</div>
					</div>
					<div class="product-list">
					</div>
				</div>
			</div>
		</div>
		<?php include_once "./inc/footer.php" ?>