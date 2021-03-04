<?php
include_once "inc/header.php";
include_once "inc/setting.php";
include_once "../classes/userinfo.php";
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
						<div>Thông tin
							<div class="page-title-subheading">
								Thông tin thiết bị
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Thông tin thiết bị</div>
						<div class="table-responsive" style="padding-bottom: 10px;">
							<table class="align-middle mb-0 table table-borderless table-striped table-hover">
								<thead>
									<tr>
										<th style="display: block; margin-left: 10px;">Tên Admin</th>
										<th class="text-center text-muted">Thiết bị</th>
										<th class="text-center text-muted">Hệ điều hành</th>
										<th class="text-center text-muted">Trình duyệt</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="widget-content p-0">
												<div class="widget-content-wrapper">
													<div class="widget-content-left mr-3">
														<div class="widget-content-left">
															<img class="rounded-circle border-circle" src="uploads/avatars/<?php echo Session::get("adminImage") ?>" alt="">
														</div>
													</div>
													<div class="widget-content-left flex2">
														<div class="widget-heading"><?php echo Session::get("adminName") ?></div>
														<div class="widget-subheading opacity-7"><?php echo Session::get("adminDescription") ?></div>
													</div>
												</div>
											</div>
										</td>
										<td class="text-center text-muted">
											<?= userInfo::getDevices(); ?>
										</td>
										<td class="text-center text-muted">
											<?= userInfo::getOS(); ?>
										</td>
										<td class="text-center text-muted">
											<?= userInfo::getBrowser(); ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>