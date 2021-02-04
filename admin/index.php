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
						<div>Analytics Dashboard
							<div class="page-title-subheading">This is an example dashboard created using build-in elements and
								components.
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
										<?php
										$countCategory = $cat->countCategory();
										if ($countCategory) {
											echo $countCategory["countCategory"];
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
										<?php
										$countBrand = $brand->countBrand();
										if ($countBrand) {
											echo $countBrand["countBrand"];
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
				<div class="d-xl-none d-lg-block col-md-6 col-xl-4">
					<div class="card mb-3 widget-content">
						<div class="widget-content-outer">
							<div class="widget-content-wrapper">
								<div class="widget-content-left">
									<div class="widget-heading">Income</div>
									<div class="widget-subheading">Expected totals</div>
								</div>
								<div class="widget-content-right">
									<div class="widget-numbers text-focus">$147</div>
								</div>
							</div>
							<div class="widget-progress-wrapper">
								<div class="progress-bar-sm progress-bar-animated-alt progress">
									<div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
								</div>
								<div class="progress-sub-label">
									<div class="sub-label-left">Expenses</div>
									<div class="sub-label-right">100%</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Active Users
						</div>
						<div class="table-responsive">
							<table class="align-middle mb-0 table table-borderless table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th>Name</th>
										<th class="text-center">City</th>
										<th class="text-center">Status</th>
										<th class="text-center">Actions</th>
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
										<td class="text-center">Madrid</td>
										<td class="text-center">
											<div class="badge badge-warning">Pending</div>
										</td>
										<td class="text-center">
											<button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
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
										<td class="text-center">Berlin</td>
										<td class="text-center">
											<div class="badge badge-success">Completed</div>
										</td>
										<td class="text-center">
											<button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Details</button>
										</td>
									</tr>
									<tr>
										<td class="text-center text-muted">#321</td>
										<td>
											<div class="widget-content p-0">
												<div class="widget-content-wrapper">
													<div class="widget-content-left mr-3">
														<div class="widget-content-left">
															<img width="40" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
														</div>
													</div>
													<div class="widget-content-left flex2">
														<div class="widget-heading">Elliot Huber</div>
														<div class="widget-subheading opacity-7">Lorem ipsum dolor sic</div>
													</div>
												</div>
											</div>
										</td>
										<td class="text-center">London</td>
										<td class="text-center">
											<div class="badge badge-danger">In Progress</div>
										</td>
										<td class="text-center">
											<button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Details</button>
										</td>
									</tr>
									<tr>
										<td class="text-center text-muted">#55</td>
										<td>
											<div class="widget-content p-0">
												<div class="widget-content-wrapper">
													<div class="widget-content-left mr-3">
														<div class="widget-content-left">
															<img width="40" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
														</div>
													</div>
													<div class="widget-content-left flex2">
														<div class="widget-heading">Vinnie Wagstaff</div>
														<div class="widget-subheading opacity-7">UI Designer</div>
													</div>
												</div>
											</div>
										</td>
										<td class="text-center">Amsterdam</td>
										<td class="text-center">
											<div class="badge badge-info">On Hold</div>
										</td>
										<td class="text-center">
											<button type="button" id="PopoverCustomT-4" class="btn btn-primary btn-sm">Details</button>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="d-block text-center card-footer">
							<button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
							<button class="btn-wide btn btn-success">Save</button>
						</div>
					</div>
				</div>
			</div>

		</div>

		<?php include_once "./inc/footer.php" ?>