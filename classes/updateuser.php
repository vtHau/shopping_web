<?php
include_once "user.php";
$user = new user();
include_once "../lib/session.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["type"])) {
	if (Session::isUserLogin()) {
		if ($_POST["type"] == "updateStatus") {
			$updateStatus = $user->updateStatus();
		}
	}

	if ($_POST["type"] == "getUserOnline") {
		$userOnline = $user->getUserOnline();
		$result = '';
		$i = 0;
		$sex;
		if ($userOnline) {
			while ($getUser = $userOnline->fetch_assoc()) {
				$i++;
				if ($getUser["userSex"]  == 0) {
					$sex = "Nam";
				} else {
					$sex = "Nữ";
				}
				$result .= '
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
											<tr>
													<td class="text-center text-muted">' . $i . '</td>
													<td class="text-center text-muted">' . $getUser["userID"] . '</td>
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
																	<div class="widget-subheading opacity-7">' . $getUser["username"] . '</div>
																</div>
															</div>
														</div>
													</td>
													<td class="text-center text-muted">' . $getUser["userBirthDay"] . '</td>
													<td class="text-center text-muted"> ' . $sex . '</td>
													<td class="text-center text-muted">' . $getUser["userPhone"] . '</td>
													<td class="text-center text-muted">' . $getUser["userImage"] . '</td>
													<td class="text-center text-muted">' . $getUser["userAddress"] . '</td>
													<td class="text-center text-muted">' . $getUser["userStatus"] . '</td>
													<td class="text-center">
														<a href="" class="btn btn-danger btn-sm">Xóa</a>
													</td>
											</tr>
										</tbody>
									</table>
                ';
			}
		} else {
			$result = '	<div class="text-center text-noti">Không có người dùng nào đang trực tuyến</div>';
		}

		echo $result;
	}
}
