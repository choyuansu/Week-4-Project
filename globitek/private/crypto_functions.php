<?php

function encrypt($value) {
  $key = substr(md5('choyuansu', true), 0, 16);
  $iv = '1234567812345678';
  $value = openssl_encrypt($value, 'AES-128-CBC', $key, true, $iv);
  return $value;
}

function decrypt($value) {
  $key = substr(md5('choyuansu', true), 0, 16);
  $iv = '1234567812345678';
  $value = openssl_decrypt($value, 'AES-128-CBC', $key, true, $iv);
  return $value;
}

function signing_checksum($string) {
  $salt = "qi02BcXzp639"; // makes process hard to guess
  return hash('sha256', $string . $salt);
}

function sign_string($string) {
  return $string . '--' . signing_checksum($string);
}

function signed_string_is_valid($signed_string) {
  $array = explode('--', $signed_string);
  // if not 2 parts it is malformed or not signed
  if(count($array) != 2) { return false; }

  $new_checksum = signing_checksum($array[0]);
  return ($new_checksum === $array[1]);
}

?>
