<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
?>

<?php
require("jwt.php");
$conn = new Database();

$json = file_get_contents("php://input");
$obj = json_decode($json, true);



// $username = "trunghau";
// $password = md5("1234");

$username = $obj["username"];
$password = md5($obj["password"]);

$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";

$result = $conn->select($query);

if($result) {
	$value = $result->fetch_assoc();

	$token = [];
	$token["username"] = $value["username"];
	$token["userFullName"] = $value["userFullName"];
	$token["userEmail"] = $value["userEmail"];
	$token["userPhone"] = $value["userPhone"];
	$token["userAddress"] = $value["userAddress"];

echo $token;
	// $jsonWebToken = JWT::encode($token, "TRUNG_HAU");
	// echo JsonHelper::getJson("token", $jsonWebToken);
    // echo json_encode($token);
} else {
	echo "{'token': 'ERROR'}";
}

?>

