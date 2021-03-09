<?php include_once "./inc/header.php" ?>
<?php include_once "./inc/setting.php" ?>

<?php
if (!isset($_GET["userID"]) || $_GET["userID"] == NULL) {
	echo '<script> window.location = "userlist.php" </script>';
} else {
	$userID = $_GET["userID"];
}

if (isset($_GET["deleteID"])) {
	$ID = $_GET["deleteID"];
	$deleteProduct = $product->deleteProduct($ID);
}


if (isset($_POST["type"]) && $_POST["type"] == "blockUser") {
	$userID = $_POST["userID"];
	$blockUser = $user->blockUser($userID);
}

if (isset($_POST["type"]) && $_POST["type"] == "unBlockUser") {
	$userID = $_POST["userID"];
	$blockUser = $user->unBlockUser($userID);
}

if (isset($_GET["unblock"])) {
	$ID = $_GET["unblock"];
	$unBlockUser = $user->unBlockUser($ID);
}
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
						<div>
							Tính năng
							<div class="page-title-subheading">
								Nhiều tính năng hơn
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main-card mb-3 card">
				<div class="card-body">
					<h5 class="card-title text-center mt-3 pb-4" style="font-size: 25px; border-bottom: 1px solid rgba(26,54,126,0.125);">
						<i class="fas fa-user-cog" style="font-size: 40px;"></i>
						<br>
						<?php
						$getUser = $user->getCustomer($userID);
						if ($getUser) {
							$result = $getUser->fetch_assoc();
							echo $result["userFullName"];
						}
						?>
					</h5>
					<div class="row mt-5 mb-4">
						<div class="col-md-4 text-center">
							<a href="device.php?userID=<?php echo $userID ?>">
								<div class="card-device more-feature float-right">
									<div class="card-device-title">
										<i class="fas fa-mobile-alt" style="font-size: 25px;"></i>
										<br />
										Thông tin thiết bị
									</div>
								</div>
							</a>
						</div>
						<?php
						if ($result["userBlock"] < 5) {
						?>
							<div class="col-md-4 text-center">
								<div class="card-device more-feature">
									<div class="card-device-title block-user">
										<i class="fas fa-user-lock" style="font-size: 25px;"></i>
										<br />
										Khóa tài khoản
									</div>
								</div>
							</div>
						<?php } else { ?>

							<div class="col-md-4 text-center">
								<div class="card-device more-feature">
									<div class="card-device-title unblock-user">
										<i class="fas fa-unlock" style="font-size: 25px;"></i>
										<br />
										Mở khóa tài khoản
									</div>
								</div>
							</div>
						<?php } ?>

						<div class="col-md-4 text-center">
							<a href="deleteID=<?php echo $userID ?>">
								<div class="card-device more-feature float-left">
									<div class="card-device-title">
										<i class="fa fa-trash" style="font-size: 25px;"></i>
										<br />
										Xóa
									</div>
								</div>
							</a>
						</div>
						<input type="hidden" class="user-id" style="display: none;" value="<?php echo $userID; ?>" />
					</div>
				</div>
			</div>
		</div>

		<?php include_once "./inc/footer.php" ?>