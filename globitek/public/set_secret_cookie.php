<?php
require_once('../private/initialize.php');
$str = '';
$value = 'I have a secret to tell.';
$key = substr(md5('choyuansu', true), 0, 16);
$iv = '1234567812345678';
$value = openssl_encrypt($value, 'AES-128-CBC', $key, true, $iv);
setcookie('scrt', $value);
?>
