<?php
// Setting secure session cookie parameters before starting the session
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
// Redirect to homepage or login page after clicking logout
header("Location: index.php"); 

exit();