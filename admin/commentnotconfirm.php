<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<?php
if (isset($_GET["confirmReviewID"])) {
	$reviewID = $_GET["confirmReviewID"];
	$confirmReview = $review->confirmReview($reviewID);
}

if (isset($_GET["deleteReviewID"])) {
	$reviewID = $_GET["deleteReviewID"];
	$deleteReviewID = $review->deleteReviewID($reviewID);
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
						<div>Bình luận
							<div class="page-title-subheading">
								Bình luận chờ đánh giá
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="main-card mb-3 card">
						<div class="card-header">Danh sách bình luận</div>
						<div class="table-responsive" style="padding-bottom: 10px;">
							<?php
							$getReview = $review->getReivewNotConfirm();
							if ($getReview) {
								$i = 0;
							?>
								<table class="align-middle mb-0 table table-borderless table-striped table-hover">
									<thead>
										<tr>
											<th class="text-center">STT</th>
											<th>Tên người dùng</th>
											<th>Bình luận</th>
											<th class="text-center">Sao</th>
											<th class="text-center">Thời gian</th>
											<th class="text-center">Trạng thái</th>
											<th class="text-center">Tính năng</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($result = $getReview->fetch_assoc()) {
											$i++;
										?>
											<tr>
												<td class="text-center text-muted"><?php echo $i; ?></td>
												<td>
													<div class="widget-content p-0">
														<div class="widget-content-wrapper">
															<div class="widget-content-left mr-3">
																<div class="widget-content-left">
																	<img class="rounded-circle border-circle" src="uploads/avatars/<?php echo $result["userImage"] ?>" alt="">
																</div>
															</div>
															<div class="widget-content-left flex2">
																<div class="widget-heading"><?php echo $result["userFullName"] ?></div>
																<div class="widget-subheading opacity-7"></div>
															</div>
														</div>
													</div>
												</td>

												<td class=" text-muted">
													<?php echo $result["comment"] ?>
												</td>

												<td class="text-center text-muted">
													<div class="list-star">
														<?php
														$star = $result["star"];
														for ($j = 0; $j < $star; $j++) {
															echo ' <i class="fa fa-star" style="color: #f39c11;"></i>';
														}
														for ($star; $star < 5; $star++) {
															echo ' <i class="fa fa-star-o" style="color: #f39c11;"></i>';
														}
														?>
													</div>
												</td>
												<td class="text-center text-muted"><?php echo $result["timeReview"] ?></td>
												<td class="text-center text-muted">
													<?php
													if ($result["status"] == 1) {
														echo "Đã xác nhận";
													} else {
														echo "Chờ xác nhận";
													}
													?>
												</td>

												<td class="text-center">
													<a href="commentlist.php?confirmReviewID=<?php echo $result["reviewID"] ?>" class="btn btn-success btn-sm">Xác nhận</a>
													<a data-id="<?php echo $result["reviewID"] ?>" class="btn btn-danger btn-sm del-review">Xóa</a>
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