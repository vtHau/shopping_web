<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<?php
if (!isset($_GET["editID"]) || $_GET["editID"] == NULL) {
	echo "<script>window.location = 'brandlist.php'</script>";
} else {
	$ID = $_GET["editID"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])) {
	$updateBrand = $brand->updateBrand($ID, $_POST, $_FILES);
}
?>

<div class="app-main">
	<!-- add slidebar -->
	<?php include_once "./inc/slidebar.php" ?>

	<div class="app-main__outer">

		<div class="app-main__inner">

			<div class="app-page-title">
				<div class="page-title-wrapper">
					<div class="page-title-heading">
						<div class="page-title-icon">
							<i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
						</div>
						<div>Thương hiệu
							<div class="page-title-subheading">
								Chỉnh sửa thương hiệu
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
					<h5 class="card-title">Chỉnh sửa thương hiệu</h5>
					<?php
					$getBrandByID = $brand->getBrandByID($ID);
					if ($getBrandByID) {
						while ($result = $getBrandByID->fetch_assoc()) {
					?>
							<form class="needs-validation" method="POST" enctype="multipart/form-data" novalidate>
								<div class="form-row">
									<div class="col-md-6 mb-3">
										<label for="validationTooltip01">Tên thương hiệu</label>
										<input type="text" class="form-control" id="validationTooltip01" name="brandName" placeholder="Tên danh mục" value="<?php echo $result["brandName"] ?>" required>
										<div class="invalid-feedback" style="font-size: 20px;">Vui lòng nhập đầy đủ dữ liệu.</div>
										<div class="valid-feedback">Tuyệt vời!!!</div>
									</div>

									<div class="col-md-6 mb-3">
										<label for="validationTooltip01">Mô tả</label>
										<input type="text" class="form-control" id="validationTooltip01" name="brandDescription" placeholder="Mô tả" value="<?php echo $result["brandDescription"] ?>" required>
										<div class="invalid-feedback">Vui lòng nhập đầy đủ dữ liệu.</div>
										<div class="valid-feedback">Tuyệt vời!!!</div>
									</div>
								</div>

								<div class="form-row ">
									<div class="col-md-12 mb-3">
										<div class="custom-file">
											<input type="file" class="form-control" name="brandImage" accept=".PNG, .JPEG, .JPG">
											<div class="mess-file-new">Để trống nếu sử dụng logo cũ.</div>

										</div>
									</div>
								</div>

								<div class="form-row text-center">
									<div class="col-12">
										<p class="mess-file-older">Logo danh mục hiện tại</p>
										<img class="rounded-circle border-circle" src="uploads/brands/<?php echo $result["brandImage"] ?>" alt="">
									</div>
								</div>

								<div class="form-row text-center">
									<div class="col-md-12 mb-3 mt-3">
										<button class="btn btn-success " style="padding-left: 35px; padding-right:35px ;" name="submit" type="submit">Cập nhập</button>
									</div>
								</div>
							</form>
					<?php }
					} ?>
				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>