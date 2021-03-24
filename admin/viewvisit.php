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
						<div>Truy cập
							<div class="page-title-subheading">
								Thông tin truy cập
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title text-center mt-3 pb-4" style="font-size: 25px; border-bottom: 1px solid rgba(26,54,126,0.125);"><i class="fas fa-cogs" style="font-size: 40px;"></i> <br>Thông tin truy cập</h5>

					<div class="row mt-4 mb-4">
						<div class="col-md-4 text-center">
							<div class="card-device">
								<div class="card-device-title">
									<i class="fas fa-desktop" style="font-size: 25px;"></i>
									<br />
									Lượt truy cập
								</div>
								<div class="card-device-body">
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
						<div class="col-md-4 text-center">
							<div class="card-device">
								<div class="card-device-title">
									<i class="fa fa-windows" style="font-size: 25px;"></i>
									<br />
									Khách truy cập
								</div>
								<div class="card-device-body">
								</div>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="card-device">
								<div class="card-device-title">
									<i class="fa fa-chrome" style="font-size: 25px;"></i>
									<br />
									Người dùng
								</div>
								<div class="card-device-body count-user-on">
									Đang cập nhập
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>

		<script>
			function getCountUserOnline() {
				$.ajax({
					url: '../classes/request.php',
					method: "POST",
					data: {
						type: "getCountUserOnline"
					},
					success: function(result) {
						$('.count-user-on').html(result.trim());
					}
				});
			}

			getCountUserOnline();

			setInterval(function() {
				getCountUserOnline();
			}, 3000);
		</script>