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
						<div>Danh sách nguời dùng
							<div class="page-title-subheading">
								Chỉnh sửa và xóa ngươi dùng
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Danh sách người dùng</div>
						<div class="table-responsive" style="padding-bottom: 10px;">
							<?php
							$getUser = $user->getAllUser();
							if ($getUser) {
								$i = 0;
							?>
								<table class="align-middle mb-0 table table-borderless table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center">STT</th>
											<th class="text-center">ID</th>
											<th class="text-center">Tên người dùng</th>
											<th class="text-center">Ngày sinh</th>
											<th class="text-center">Giới tính</th>
											<th class="text-center">Điện thoại</th>
											<th class="text-center">Email</th>
											<th class="text-center">Địa chỉ</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center">Tính năng</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($result = $getUser->fetch_assoc()) {
											$i++;
										?>
											<tr>
												<td class="text-center text-muted"><?php echo $i; ?></td>
												<td class="text-center text-muted"><?php echo $result["userID"] ?></td>
												<td>
													<div class="widget-content p-0">
														<div class="widget-content-wrapper">
															<div class="widget-content-left mr-3  ">
																<div class="widget-content-left <?php if ($result["userLastLogin"] > time()) {
																																	echo "user-on";
																																} ?>" style="position: relative;">
																	<img class="rounded-circle border-circle" src="uploads/avatars/<?php echo $result["userImage"] ?>" alt="">
																</div>
															</div>
															<div class="widget-content-left flex2">
																<div class="widget-heading"><?php echo $result["userFullName"] ?></div>
																<div class="widget-subheading opacity-7"><?php echo $result["username"] ?></div>
															</div>
														</div>
													</div>
												</td>
												<td class="text-center text-muted"><?php echo $result["userBirthDay"] ?></td>
												<td class="text-center text-muted">
													<?php
													if ($result["userSex"]  == 0) {
														echo "Nam";
													} else {
														echo "Nữ";
													}
													?>
												</td>
												<td class="text-center text-muted"><?php echo $result["userPhone"] ?></td>
												<td class="text-center text-muted"><?php echo $result["userEmail"] ?></td>
												<td class="text-center text-muted"><?php echo $result["userAddress"] ?></td>
												<td class="text-center text-muted"><?php echo $result["userStatus"] ?></td>
												<td class="text-center">
													<a href="morefeature.php?userID=<?php echo $result["userID"] ?>" class="btn btn-primary btn-sm">Nhiều hơn</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							<?php } else { ?>
								<div class="text-center text-noti">Không có sản phẩm nào để hiển thị</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include_once "./inc/footer.php" ?>