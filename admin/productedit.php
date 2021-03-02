<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<?php
if (!isset($_GET["editID"]) || $_GET["editID"] == NULL) {
	echo "<script>window.location = 'productlist.php'</script>";
} else {
	$ID = $_GET["editID"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
	$updateProduct = $product->updateProduct($ID, $_POST, $_FILES);
}
?>

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
								Chỉnh sửa sản phẩm
							</div>
						</div>
					</div>
				</div>

			</div>

			<script>
				// Example starter JavaScript for disabling form submissions if there are invalid fields
				(function() {
					'use strict';
					window.addEventListener('load', function() {
						// Fetch all the forms we want to apply custom Bootstrap validation styles to
						var forms = document.getElementsByClassName('needs-validation');
						// Loop over them and prevent submission
						var validation = Array.prototype.filter.call(forms, function(form) {
							form.addEventListener('submit', function(event) {
								if (form.checkValidity() === false) {
									event.preventDefault();
									event.stopPropagation();
								}
								form.classList.add('was-validated');
							}, false);
						});
					}, false);
				})();
			</script>

			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title">Thêm sản phẩm</h5>
					<?php
					$getProductByID = $product->getProductByID($ID);
					if ($getProductByID) {
						while ($resultProduct = $getProductByID->fetch_assoc()) {
					?>
							<form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
								<div class="form-row">

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Tên sản phẩm</label>
										<input type="text" class="form-control" name="productName" id="validationTooltip01" placeholder="Tên sản phẩm" value="<?php echo $resultProduct["productName"] ?>" required>
										<div class="invalid-feedback">Vui lòng nhập đầy đủ dữ liệu.</div>
										<div class="valid-feedback">Tuyệt vời!!!</div>
									</div>

									<div class="col-md-4 mb-3">
										<label for="">Danh mục</label>
										<select class="mb-2 form-control" name="productCategory">
											<?php
											$getCategory = $cat->getCategory();
											if ($getCategory) {
												while ($result = $getCategory->fetch_assoc()) {
											?>
													<option <?php
																	if ($result["catID"] == $resultProduct["productCategory"]) {
																		echo "selected";
																	} ?> value="<?php echo $result["catID"]; ?>">
														<?php echo $result["catName"]; ?>
													</option>
											<?php
												}
											}
											?>
										</select>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Thương hiệu</label>
										<select class="mb-2 form-control" name="productBrand">
											<?php
											$getBrand = $brand->getBrand();
											if ($getBrand) {
												while ($result = $getBrand->fetch_assoc()) {
											?>
													<option <?php
																	if ($result["brandID"] == $resultProduct["productBrand"]) {
																		echo "selected";
																	} ?> value="<?php echo $result["brandID"]; ?>">
														<?php echo $result["brandName"]; ?>
													</option>
											<?php
												}
											}
											?>
										</select>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Giá sản phẩm</label>
										<input type="number" class="form-control" name="productPrice" id="validationTooltip01" placeholder="Giá sản phẩm" value="<?php echo $resultProduct["productPrice"] ?>" required>
										<div class="invalid-feedback">Vui lòng nhập đầy đủ dữ liệu.</div>
										<div class="valid-feedback">Tuyệt vời!!!</div>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Mô tả sản phẩm</label>
										<input type="text" class="form-control" name="productDesc" id="validationTooltip01" placeholder="Mô tả" value="<?php echo $resultProduct["productDesc"] ?>" required>
										<div class="invalid-feedback">Vui lòng nhập đầy đủ dữ liệu.</div>
										<div class="valid-feedback">Tuyệt vời!!!</div>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Nổi bật</label>
										<select class="mb-2 form-control" name="productFeather">
											<?php
											if ($resultProduct['productFeather'] == 1) {
											?>
												<option selected value="1">Sản phẩm nổi bật</option>
												<option value="0">Sản phẩm không nổi bật</option>
											<?php
											} else {
											?>
												<option value="1">Sản phẩm nổi bật</option>
												<option selected value="0">Sản phẩm không nổi bật</option>
											<?php
											}
											?>
										</select>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Bán chạy</label>
										<select class="mb-2 form-control" name="productSell">
											<?php
											if ($resultProduct['productSell'] == 1) {
											?>
												<option selected value="1">Sản phẩm bán chạy</option>
												<option value="0">Sản phẩm không bán chạy</option>
											<?php
											} else {
											?>
												<option value="1">Sản phẩm bán chạy</option>
												<option selected value="0">Sản phẩm không bán chạy</option>
											<?php
											}
											?>
										</select>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Hot Deal</label>
										<select class="mb-2 form-control" name="productHotDeal">
											<?php
											if ($resultProduct['productHotDeal'] == 1) {
											?>
												<option selected value="1">Sản phẩm Hot Deal</option>
												<option value="0">Sản phẩm không Hot Deal</option>
											<?php
											} else {
											?>
												<option value="1">Sản phẩm Hot Deal</option>
												<option selected value="0">Sản phẩm không Hot Deal</option>
											<?php
											}
											?>
										</select>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Số lượng</label>
										<input type="number" class="form-control" name="productQuantity" id="validationTooltip01" placeholder="Số lượng" value="<?php echo $resultProduct["productQuantity"] ?>" required>
										<div class="invalid-feedback">Vui lòng nhập đầy đủ dữ liệu.</div>
										<div class="valid-feedback">Tuyệt vời!!!</div>
									</div>

									<div class="col-md-12 mb-3">
										<div class="custom-file">
											<label for="validationTooltip01">Hình ảnh</label>
											<input type="file" class="form-control" name="productImage" accept=".PNG, .JPEG, .JPG">
											<div class="mess-file-new">Để trống nếu sử dụng logo cũ.</div>
										</div>
									</div>

								</div>

								<div class="form-row text-center">
									<div class="col-12">
										<p class="text-noti">Logo sản phẩm hiện tại</p>
										<img class="rounded-circle border-circle" src="uploads/products/<?php echo $resultProduct["productImage"] ?>" alt="">
									</div>
								</div>

								<div class="form-row text-center">
									<div class="col-md-12 mb-3 mt-3">
										<button class="btn btn-success " name="submit" style="padding-left: 35px; padding-right:35px ;" type="submit">Cập nhập</button>
									</div>
								</div>
							</form>
					<?php
						}
					} ?>
				</div>
			</div>
		</div>
		<?php include_once "./inc/footer.php" ?>