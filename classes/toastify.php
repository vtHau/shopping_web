<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
?>

<?php

class toastify
{
	public function showToastify($nameToast, $titleToast = "Thành công", $contentToast = "Thành công thao tác", $typeToast = "success")
	{
		if (Session::get($nameToast)  != 2) {
			$num = Session::get("$nameToast");

			if ($num == 1) {
				echo '<script> toastr["' . $typeToast . '"]("' . $contentToast . '", "' . $titleToast . '");</script>';
			}

			Session::set($nameToast, ++$num);
		} else {
			unset($_SESSION[$nameToast]);
		}
	}
}
?>