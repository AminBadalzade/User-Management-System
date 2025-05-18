<?php
session_set_cookie_params([
  'lifetime' => 0,
  'path' => '/',
  'domain' => $_SERVER['HTTP_HOST'],
  'secure' => true,      // Ensures cookie is only sent over HTTPS
  'httponly' => true,    // Prevents JavaScript access
  'samesite' => 'Strict' // Helps prevent CSRF
]);
session_start();
session_unset();
session_destroy();
header("Location: index.php");
exit();