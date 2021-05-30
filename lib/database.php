<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../config/config.php'); ?>

<?php
class Database
{
  public $host   = DB_HOST;
  public $user   = DB_USER;
  public $pass   = DB_PASS;
  public $dbname = DB_NAME;

  private static $_instance;
  public $link;
  public $error;

  public static function getInstance()
  {
    if (!self::$_instance) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function __construct()
  {
    $this->link = new mysqli(
      $this->host,
      $this->user,
      $this->pass,
      $this->dbname
    );
    if (!$this->link) {
      $this->error = "Connection fail" . $this->link->connect_error;
      return false;
    }
  }

  public function select($query)
  {
    $result = $this->link->query($query) or
      die($this->link->error . __LINE__);
    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }
  }

  // Insert data
  public function insert($query)
  {
    $insert_row = $this->link->query($query);
    if ($insert_row) {
      return $insert_row;
    } else {
      // echo "query = " . $query . "\n";
      // echo "erorr = " . $this->link->error;
      return false;
    }
  }

  // Update data
  public function update($query)
  {
    $update_row = $this->link->query($query);
    if ($update_row) {
      return $update_row;
    } else {
      return false;
    }
  }

  // Delete data
  public function delete($query)
  {
    $delete_row = $this->link->query($query);
    if ($delete_row) {
      return $delete_row;
    } else {
      return false;
    }
  }

  public function __destruct()
  {
    try {
      $this->link->close();
    } catch (Exception $e) {
      echo "Message: " . $e->getMessage();
    }
  }
}
