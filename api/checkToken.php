<?php 
	require("jwt.php");

	$token = $_GET["token"];

	$json = JWT::decode($token, "TRUNG_HAU", true);
	echo json_encode($json);
?>