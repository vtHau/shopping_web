<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<?php
if (!isset($_GET["editID"]) || $_GET["editID"] == NULL) {
	echo "<script>window.location = 'sliderlist.php'</script>";
} else {
	$ID = $_GET["editID"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
	$updateSlider = $slider->updateSlider($ID, $_POST, $_FILES);
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
						<div>Slider
							<div class="page-title-subheading">
								Chỉnh sửa Slider
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
					<h5 class="card-title">Chỉnh sửa slider</h5>
					<?php
					$getSliderByID = $slider->getSliderByID($ID);
					if ($getSliderByID) {
						while ($resultSlider = $getSliderByID->fetch_assoc()) {
					?>
							<form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
								<div class="form-row">

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Tên slider</label>
										<input type="text" class="form-control" name="sliderName" id="validationTooltip01" placeholder="Tên slider" value="<?php echo $resultSlider["sliderName"] ?>" required>
										<div class="invalid-feedback">Vui lòng nhập đầy đủ dữ liệu.</div>
										<div class="valid-feedback">Tuyệt vời!!!</div>
									</div>

									<div class="col-md-4 mb-3">
										<label for="">Sản phẩm</label>
										<select class="mb-2 form-control" name="productID">
											<?php
											$getProduct = $product->getProduct();
											if ($getProduct) {
												while ($result = $getProduct->fetch_assoc()) {
											?>
													<option <?php
																	if ($result["productID"] == $resultSlider["productID"]) {
																		echo "selected";
																	} ?> value="<?php echo $result["productID"]; ?>">
														<?php echo $result["productName"]; ?>
													</option>
											<?php
												}
											}
											?>
										</select>
									</div>

									<div class="col-md-4 mb-3">
										<label for="validationTooltip01">Hiện/ Ẩn</label>
										<select class="mb-2 form-control" name="sliderType">
											<?php
											if ($resultSlider['sliderType'] == 1) {
											?>
												<option selected value="1">Hiện</option>
												<option value="0">Ẩn</option>
											<?php
											} else {
											?>
												<option value="1">Hiện</option>
												<option selected value="0">Ẩn</option>
											<?php
											}
											?>
										</select>
									</div>

									<div class="col-md-4 mb-3">
										<div class="custom-file">
											<label for="validationTooltip01">Hình ảnh</label>
											<input type="file" class="form-control" name="sliderImage" accept=".PNG, .JPEG, .JPG">
											<div class="mess-file-new">Để trống nếu sử dụng logo cũ.</div>
										</div>
									</div>

								</div>

								<div class="form-row text-center">
									<div class="col-12">
										<p class="text-noti">Logo sản phẩm hiện tại</p>
										<img class="rounded-circle border-circle" src="uploads/sliders/<?php echo $resultSlider["sliderImage"] ?>" alt="">
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