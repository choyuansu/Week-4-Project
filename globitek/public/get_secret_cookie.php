<?php
require_once('../private/initialize.php');

$value = $_COOKIE['scrt'];
if(signed_string_is_valid($value)) {
  $pos = strpos($value, "--");
  $encrypted_string = substr($value, 0, $pos);
  echo decrypt($encrypted_string);
}
else {
  exit('Error: invalid signature');
}
?>
