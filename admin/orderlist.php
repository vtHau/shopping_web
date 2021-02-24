<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<?php
if (isset($_GET["deleteID"]) && $_GET["deleteID"] != NULL) {
	$ID = $_GET["deleteID"];
	$deleteOrder = $order->deleteOrderInAdmin($ID);
}

if (isset($_GET["confirm"]) && $_GET["confirm"] != NULL) {
	$orderID = $_GET["confirm"];
	$confirmOrder = $order->confirmOrder($orderID);
}

if (isset($_GET["transport"]) && $_GET["transport"] != NULL) {
	$orderID = $_GET["transport"];
	$transportOrder = $order->transportOrder($orderID);
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
						<div>Danh sách mua hàng
							<div class="page-title-subheading">
								Chỉnh sửa và xóa sản phẩm
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Danh sách mua hàng</div>
						<div class="table-responsive" style="padding-bottom: 10px;">
							<?php
							$getOrder = $order->getOrderInAdmin();
							if ($getOrder) {
								$i = 0;
							?>
								<table class="align-middle mb-0 table table-borderless table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center">STT</th>
											<th class="text-center">Tên sản phẩm</th>
											<th class="text-center">Tên khách hàng</th>
											<th class="text-center">Số điện thoại</th>
											<th class="text-center">Địa chỉ</th>
											<th class="text-center">Số lượng</th>
											<th class="text-center">Tổng tiền</th>
											<th class="text-center">Thời gian</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center">Tính năng</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($result = $getOrder->fetch_assoc()) {
											$i++;
										?>
											<tr>
												<td class="text-center text-muted"><?php echo $i; ?></td>
												<td>
													<div class="widget-content p-0">
														<div class="widget-content-wrapper">
															<div class="widget-content-left mr-3">
																<div class="widget-content-left">
																	<img class="rounded-circle border-circle" src="uploads/products/<?php echo $result["productImage"] ?>" alt="">
																</div>
															</div>
															<div class="widget-content-left flex2">
																<div class="widget-heading "><?php echo $result["productName"] ?></div>
																<div class="widget-subheading opacity-7"><?php echo $result["productName"] ?></div>
															</div>
														</div>
													</div>
												</td>
												<td class="text-center text-muted"><?php echo $result["userFullName"] ?></td>
												<td class="text-center text-muted"><?php echo $result["userPhone"] ?></td>
												<td class="text-center text-muted"><?php echo $result["userAddress"] ?></td>
												<td class="text-center text-muted"><?php echo $result["productQuantity"] ?></td>
												<td class="text-center text-muted"><?php echo $result["productPrice"] ?></td>
												<td class="text-center text-muted"><?php echo $result["timeOrder"] ?></td>

												<td class="text-center font-weight-bold">
													<?php
													if ($result["statusOrder"] == 0) {
													?>
														Chờ xác nhận
													<?php } elseif ($result["statusOrder"] == 1) {
													?>
														Chờ vận chuyển
													<?php } elseif ($result["statusOrder"] == 2) {
													?>
														Đang giao hàng
													<?php } elseif ($result["statusOrder"] == 3) {
													?>
														Đã nhận hàng
													<?php } ?>

												</td>

												<td class="text-center">
													<?php
													if ($result["statusOrder"] == 0) {
													?>
														<a href="orderlist.php?confirm=<?php echo $result["orderID"] ?>" class="btn btn-primary btn-sm font-weight-bold" style="font-weight: bold;">Xác nhận</a>
													<?php } elseif ($result["statusOrder"] == 1) {
													?>
														<a href="orderlist.php?transport=<?php echo $result["orderID"] ?>" class="btn btn-primary btn-sm font-weight-bold" style="font-weight: bold;">Vận chuyển</a>
													<?php } elseif ($result["statusOrder"] == 2) {
													?>

													<?php } elseif ($result["statusOrder"] == 3) {
													?>
														<a style="pointer-events: none;" href="?deleteID=<?php echo $result["productID"] ?>" class="btn btn-light btn-sm font-weight-bold"><del>Xóa</del></a>
													<?php } elseif ($result["statusOrder"] == 4) {
													?>
														<a href="?deleteID=<?php echo $result["orderID"] ?>" class="btn btn-danger btn-sm font-weight-bold">Xóa</a>
													<?php } ?>

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