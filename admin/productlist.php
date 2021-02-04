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
						<div>Danh sách Sản phẩm
							<div class="page-title-subheading">
								Chỉnh sửa và Xóa Sản Phẩm
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Danh sách sản phẩm</div>
						<div class="table-responsive" style="padding-bottom: 10px;">
							<table class="align-middle mb-0 table table-borderless table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">STT</th>
										<th>Tên sản phẩm</th>
										<th class="text-center">Giá</th>
										<th class="text-center">Thương hiệu</th>
										<th class="text-center">Danh mục</th>
										<th class="text-center">Thể loại</th>
										<th class="text-center">Chức năng</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center text-muted">#345</td>
										<td>
											<div class="widget-content p-0">
												<div class="widget-content-wrapper">
													<div class="widget-content-left mr-3">
														<div class="widget-content-left">
															<img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
														</div>
													</div>
													<div class="widget-content-left flex2">
														<div class="widget-heading">John Doe</div>
														<div class="widget-subheading opacity-7">Web Developer</div>
													</div>
												</div>
											</div>
										</td>
										<td class="text-center text-muted">#345</td>
										<td class="text-center text-muted">#345</td>
										<td class="text-center text-muted">#345</td>
										<td class="text-center text-muted">#345</td>

										<td class="text-center">
											<a href="" class="btn btn-primary btn-sm">Chỉnh sửa</a>
											<a href="" class="btn btn-danger btn-sm">Xóa</a>
										</td>
									</tr>
									<tr>
										<td class="text-center text-muted">#347</td>
										<td>
											<div class="widget-content p-0">
												<div class="widget-content-wrapper">
													<div class="widget-content-left mr-3">
														<div class="widget-content-left">
															<img width="40" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
														</div>
													</div>
													<div class="widget-content-left flex2">
														<div class="widget-heading">Ruben Tillman</div>
														<div class="widget-subheading opacity-7">Etiam sit amet orci eget</div>
													</div>
												</div>
											</div>
										</td>

										<td class="text-center text-muted">#345</td>
										<td class="text-center text-muted">#345</td>
										<td class="text-center text-muted">#345</td>
										<td class="text-center text-muted">#345</td>
										<td class="text-center">
											<a href="" class="btn btn-primary btn-sm">Chỉnh sửa</a>
											<a href="" class="btn btn-danger btn-sm">Xóa</a>
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