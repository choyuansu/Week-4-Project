<?php
require_once('../private/initialize.php');

$value = 'I have a secret to tell.';
$value = encrypt($value);
$value = sign_string($value);
setcookie('scrt', $value);
?>
