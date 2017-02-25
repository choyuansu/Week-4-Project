<?php
require_once('../private/initialize.php');

// TODO: sign cookie???
$key = substr(md5('choyuansu', true), 0, 16);
$iv = '1234567812345678';
$_COOKIE['scrt'] = openssl_decrypt($_COOKIE['scrt'], 'AES-128-CBC', $key, true, $iv);
echo $_COOKIE['scrt'];
?>
