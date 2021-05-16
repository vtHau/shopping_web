<?php
include_once "user.php";
$user = new user();

include_once "device.php";
$device = new device();

include_once "chat.php";
$chat = new chat();

include_once "../lib/session.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["type"])) {

	if (Session::isUserLogin()) {
		if ($_POST["type"] == "updateStatus") {
			$updateStatus = $user->updateStatus();
		}

		if ($_POST["type"] == "isBlockUser") {
			$isBlockUser = $user->isBlockUser();

			if ($isBlockUser) {
				echo "true";
			}
		}

		if ($_POST["type"] == "sendDevice") {
			$isDevice = $device->checkDevice();
			if ($isDevice) {
				$updateDevices = $device->updateDevice();
			} else {
				$insertDevices = $device->insertDevice();
			}
		}
	}

	if ($_POST["type"] == "insertChat") {
		$message = $_POST["message"];
		$insertChat = $chat->insertChat($message);
	}

	if ($_POST["type"] == "insertChatInAdmin") {
		$message = $_POST["message"];
		$userID = $_POST["userID"];
		$insertChatInAdmin = $chat->insertChatInAdmin($userID, $message);
	}

	if ($_POST["type"] == "getChat") {
		$getChat = $chat->getChat();

		if ($getChat) {
			$xhtml = '';
			while ($result = $getChat->fetch_assoc()) {
				$toRight = "";
				if ($result["fromID"] == Session::get("userID")) {
					$toRight = "to-right";
				}
				$message = $result["message"];
				$xhtml .= '
									<div class="box-mess ' . $toRight . '">
										<div class="box-image">
											<img src="assets/img/avatars/admin.png" alt="">
										</div>
										<div class="mess-content">
											<p>' . $message . '</p>
										</div>
								</div>
								';
			}
			echo $xhtml;
		} else {
			echo '<h6 style="text-align: center; margin-top: 140px;">Không có tin nhắn.</h6>';
		}
	}

	if ($_POST["type"] == "getChatInAdmin") {
		$userID = $_POST["userID"];
		$userImage =  $_POST["userImage"];

		$getChatInAdmin = $chat->getChatInAdmin($userID);

		if ($getChatInAdmin) {
			$xhtml = '';

			while ($result = $getChatInAdmin->fetch_assoc()) {
				$toRight = "";
				if ($result["fromID"] == Session::get("adminID")) {
					$toRight = "to-right";
				}

				$message = $result["message"];

				$xhtml .= '
									<div class="box-mess ' . $toRight . '">
										<div class="box-image">
											<img src="uploads/avatars/' . $userImage . '" alt="">
										</div>
										<div class="mess-content">
											<p>' . $message . '</p>
										</div>
								</div>
								';
			}

			echo $xhtml;
		} else {
			echo '<h6 style="text-align: center; margin-top: 140px;">Không có tin nhắn.</h6>';
		}
	}

	if ($_POST["type"] == "getCountUserOnline") {
		$getCountUserOnline = $user->countUserOnline();
		if ($getCountUserOnline) {
			echo $getCountUserOnline->fetch_assoc()["countUserOnline"];
		} else {
			echo "0";
		}
	}

	if ($_POST["type"] == "getUserOnline") {
		$userOnline = $user->getUserOnline();
		$result = '';
		$i = 0;
		$sex;
		$status;
		if ($userOnline) {
			$result .= '
								<table class="align-middle mb-0 table table-borderless table-striped table-hover">
								<thead>
									<tr>
										<th class="text-center">STT</th>
										<th class="text-center">Tên người dùng</th>
										<th class="text-center">Điện thoại</th>
										<th class="text-center">Email</th>
										<th class="text-center">Trạng thái</th>
										<th class="text-center">Mô tả</th>
										<th class="text-center">Tính năng</th>
									</tr>
								</thead>
								<tbody>
							';
			while ($getUser = $userOnline->fetch_assoc()) {
				$i++;
				if ($getUser["userBlock"]  < 5) {
					$status = "Hoạt động";
				} else {
					$status = "Đã khóa";
				}
				$result .= '
									<tr>
											<td class="text-center text-muted">' . $i . '</td>
											<td>
												<div class="widget-content p-0">
													<div class="widget-content-wrapper">
														<div class="widget-content-left mr-3">
															<div class="widget-content-left">
																<div width="42" class="avatar-center avatar-border rounded-circle user-on">
																	<img width="42" class="rounded-circle " src="uploads/avatars/' . $getUser["userImage"] . '" alt="">
																</div>
															</div>
														</div>
														<div class="widget-content-left flex2">
															<div class="widget-heading">' . $getUser["userFullName"] . '</div>
														</div>
													</div>
												</div>
											</td>
											<td class="text-center text-muted">' . $getUser["userPhone"] . '</td>
											<td class="text-center text-muted">' . $getUser["userEmail"] . '</td>
											<td class="text-center text-muted">' . $status . '</td>
											<td class="text-center text-muted">' . $getUser["userStatus"] . '</td>
											<td class="text-center">
												<a href="morefeature.php?userID=' . $getUser["userID"] . '" class="btn btn-success btn-sm">Xem thêm</a>
											</td>
									</tr>
								';
			}
			$result .= '
									</tbody>
								</table>
							';
		} else {
			$result = '	<div class="text-center text-noti">Không có người dùng nào đang trực tuyến</div>';
		}

		echo $result;
	}


	if ($_POST["type"] == "SIGN_IN") {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$userSign = $user->signInUser($email, $password);
		echo $userSign;
	}
}
