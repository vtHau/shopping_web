<?php
include_once "inc/header.php";
include_once "inc/setting.php";
include_once "../classes/device.php";
$device = new device();
?>

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
						<div>Thiết bị
							<div class="page-title-subheading">
								Thông tin thiết bị
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title text-center mt-3 pb-4" style="font-size: 25px; border-bottom: 1px solid rgba(26,54,126,0.125);"><i class="fas fa-cogs" style="font-size: 40px;"></i> <br>Thông tin thiết bị</h5>
					<div class="row mt-5 mb-4">
						<div class="col-md-4 text-center">
							<div class="card-device">
								<div class="card-device-title">
									<i class="fas fa-desktop" style="font-size: 25px;"></i>
									<br />
									Thiết bị
								</div>
								<div class="card-device-body">
									<?php echo $device->getDevices() ?>
								</div>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="card-device">
								<div class="card-device-title">
									<i class="fa fa-windows" style="font-size: 25px;"></i>
									<br />
									Hệ điều hành
								</div>
								<div class="card-device-body">
									<?php echo $device->getOS() ?>
								</div>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<div class="card-device">
								<div class="card-device-title">
									<i class="fa fa-chrome" style="font-size: 25px;"></i>
									<br />
									Trình duyệt
								</div>
								<div class="card-device-body">
									<?php echo $device->getBrowser() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>