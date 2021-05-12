<?php
session_start();
include_once "./classes/email.php";

$email = new email();

$result = $email->sendEmail("crtrunghau@gmail.com", "fdfsddfsd", "hhhih");

if ($result) {
  echo "true";
} else {
  echo "false";
}
