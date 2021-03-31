<?php
$filepath = realpath(dirname(__FILE__));
echo $filepath;
include_once($filepath . '/../lib/database.php');

?>

<?php
$conn = new Database();

$json = file_get_contents("php://input");
$obj = json_decode($json, true);

$fullName = $obj["fullName"];
$username = $obj["username"];
$password = md5($obj["password"]);

$query = "INSERT INTO tbl_appuser(fullName , username , password) VALUES('$fullName', '$username', '$password') ";
$result = $conn->insert($query);
