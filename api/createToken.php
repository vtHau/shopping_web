<?php 
	require("jwt.php");

	$token = [];
	$token["id"] = 123;
	$token["fullName"] = "Nguyen Van Teo";
	$token["email"] = "crtrunghau@gmail.com";

	$jsonWebToken = JWT::encode($token, "TRUNG_HAU");
	echo JsonHelper::getJson("token", $jsonWebToken);
?>