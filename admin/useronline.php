<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<?php
if (isset($_GET["deleteID"])) {
	$ID = $_GET["deleteID"];
	$deleteProduct = $product->deleteProduct($ID);
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
						<div>Danh sách nguời dùng
							<div class="page-title-subheading">
								Người dùng đang trực tuyến
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Danh sách người dùng</div>
						<div class="table-responsive" id="user-online" style="padding-bottom: 10px;">

						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once "./inc/footer.php" ?>
		<script>
			function getUserStatus() {
				$.ajax({
					url: '../classes/request.php',
					method: "POST",
					data: {
						type: "getUserOnline"
					},
					success: function(result) {
						$('#user-online').html(result);
					}
				});
			}

			setInterval(function() {
				getUserStatus();
			}, 3000);
		</script>