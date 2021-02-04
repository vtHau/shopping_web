<?php
include_once "inc/header.php";
include_once "inc/setting.php";
?>

<?php
if (isset($_GET["deleteID"])) {
	$ID = $_GET["deleteID"];
	$deleteCategory = $cat->deleteCategory($ID);
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
						<div>Danh mục
							<div class="page-title-subheading">
								Chỉnh sửa và xóa danh mục
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Danh sách danh mục</div>
						<div class="table-responsive" style="padding-bottom: 10px;">
							<?php
							$getCategory = $cat->getCategory();
							if ($getCategory) {
							?>
								<table class="align-middle mb-0 table table-borderless table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center">STT</th>
											<th>Tên danh mục</th>
											<th class="text-center">Chức năng</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 0;
										while ($result = $getCategory->fetch_assoc()) {
											$i++;
										?>
											<tr>
												<td class="text-center text-muted"><?php echo $i ?></td>
												<td>
													<div class="widget-content p-0">
														<div class="widget-content-wrapper">
															<div class="widget-content-left mr-3">
																<div class="widget-content-left">
																	<img class="rounded-circle border-circle" src="uploads/categorys/<?php echo $result["catImage"] ?>" alt="">
																</div>
															</div>
															<div class="widget-content-left flex2">
																<div class="widget-heading"><?php echo $result["catName"] ?></div>
																<div class="widget-subheading opacity-7"><?php echo $result["catDescription"] ?></div>
															</div>
														</div>
													</div>
												</td>
												<td class="text-center">
													<a href="categoryedit.php?editID=<?php echo $result["catID"] ?>" class="btn btn-primary btn-sm">Chỉnh sửa</a>
													<a href="?deleteID=<?php echo $result["catID"] ?>" class="btn btn-danger btn-sm">Xóa</a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							<?php } else { ?>
								<div class="text-center text-noti">Không có danh mục nào để hiển thị</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>