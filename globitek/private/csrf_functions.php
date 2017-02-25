<?php

  // Returns a random string suitable for a CSRF token
  function csrf_token() {
    // Requires PHP 7 or later
    return bin2hex(random_bytes(64));
  }

  // Returns HTML for a hidden form input with a CSRF token as the value
  function csrf_token_tag() {
    $token = csrf_token();
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
    return '<input type="hidden" name="csrf_token" value="'. $token .'" />';
  }

  // Returns true if form token matches session token, false if not.
  function csrf_token_is_valid() {
    echo '1';
    if(!isset($_POST['csrf_token'])) { return false; }
    echo '2';
    if(!isset($_SESSION['user_id'])) {exit('asdfasdfasdfadsfsadf');}
    //if(!isset($_SESSION['csrf_token'])) { return false; }
    echo '3';
    return ($_POST['csrf_token'] === $_SESSION['csrf_token']) && csrf_token_is_recent();
  }

  // Determines if the form token should be considered "recent"
  // by comparing it to the time a token was last generated.
  function csrf_token_is_recent() {
    $recent_limit = 600;
    if(!isset($_SESSION['csrf_token_time'])) return false;
    return ($_SESSION['csrf_token_time'] + $recent_limit) >= time();
  }

?>
