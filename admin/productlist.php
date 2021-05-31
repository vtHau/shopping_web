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
						<div>Danh sách sản phẩm
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
						<div class="card-header">Danh sách sản phẩm</div>
						<div class="table-responsive" style="padding-bottom: 10px;">
							<?php
							$getProduct = $product->getProduct();
							if ($getProduct) {
								$i = 0;
							?>
								<table class="align-middle mb-0 table table-borderless table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center">STT</th>
											<th>Tên sản phẩm</th>
											<th class="text-center">Giá</th>
											<th class="text-center">Số lượng</th>
											<th class="text-center">Thương hiệu</th>
											<th class="text-center">Danh mục</th>
											<th class="text-center">Nổi bật</th>
											<th class="text-center">Bán chạy</th>
											<th class="text-center">Hot Deal</th>
											<th class="text-center">Tính năng</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($result = $getProduct->fetch_assoc()) {
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
																<div class="widget-heading"><?php echo $result["productName"] ?></div>
																<div class="widget-subheading opacity-7"><?php echo $fm->textShorten($result["productDesc"], 40) ?></div>
															</div>
														</div>
													</div>
												</td>
												<td class="text-center text-muted"><?php echo $fm->formatMoney($result["productPrice"]) ?></td>
												<td class="text-center text-muted"><?php echo $result["productQuantity"] ?></td>
												<td class="text-center text-muted"><?php echo $result["brandName"] ?></td>
												<td class="text-center text-muted"><?php echo $result["catName"] ?></td>
												<td class="text-center text-muted">
													<?php
													if ($result["productFeather"] == 1) {
														echo "Có";
													} else {
														echo "Không nổi bật";
													}
													?>
												</td>

												<td class="text-center text-muted">
													<?php
													if ($result["productSell"] == 1) {
														echo "Bán chạy";
													} else {
														echo "Không bán chạy";
													}
													?>
												</td>

												<td class="text-center text-muted">
													<?php
													if ($result["productHotDeal"] == 1) {
														echo "HOT Deal";
													} else {
														echo "Không Hot Deal";
													}
													?>
												</td>
												<td class="text-center">
													<a href="productedit.php?editID=<?php echo $result["productID"] ?>" class="btn btn-primary btn-sm">Chỉnh sửa</a>
													<a data-id="<?php echo $result["productID"] ?>" class="btn btn-danger btn-sm del-product">Xóa</a>
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