<?php
class Session
{
  public static function init()
  {
    if (version_compare(phpversion(), '5.4.0', '<')) {
      if (session_id() == '') {
        session_start();
      }
    } else {
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    }
  }

  public static function set($key, $val)
  {
    $_SESSION[$key] = $val;
  }
  //set key thành giá trị

  public static function get($key)
  {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return false;
    }
  }

  public static function checkSession()
  {
    self::init();
    if (self::get("adminLogined") == false) {
      self::logoutAdmin();
    }
  }
  //check phiên làm việc có tồn tại hay không
  public static function checkLogin()
  {
    self::init();
    if (self::get("adminLogined") == true) {
      header("Location:index.php");
    }
  }

  public static function isUserLogin()
  {
    self::init();
    if (self::get("userLogin") == true) {
      return true;
    }
    return false;
  }

  public static function checkUserLogin()
  {
    self::init();
    if (self::get("userLogin") == false) {
      self::destroy();
      header("Location:index.php");
    }
  }

  public static function isUserBlock()
  {
    if (self::get("userBlock") == true) {
      $url = $_SERVER['REQUEST_URI'];
      if ($url != "/webshop/userblock.php") {
        header("Location:userblock.php");
      }
    }
  }

  public static function destroy()
  {
    session_destroy();
    header("Location:index.php");
  }

  public static function logoutUser()
  {
    unset($_SESSION["userLogin"]);
    unset($_SESSION["userID"]);
    unset($_SESSION["username"]);
    unset($_SESSION["userFullName"]);
    unset($_SESSION["userImage"]);
    header("Location:index.php");
  }

  public static function logoutAdmin()
  {
    unset($_SESSION["adminLogined"]);
    unset($_SESSION["adminID"]);
    unset($_SESSION["adminUser"]);
    unset($_SESSION["adminName"]);
    unset($_SESSION["adminImage"]);
    unset($_SESSION["adminDescription"]);
    header("Location:login.php");
  }
  // xóa or hủy phiên làm việc
}
