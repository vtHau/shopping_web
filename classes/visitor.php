<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class visitor
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function updateVisit()
	{
		$query = "UPDATE tbl_countvisitor SET quantity = quantity + 1 WHERE visitID = 1";
		$result = $this->db->update($query);
		return $result;
	}
}
?>