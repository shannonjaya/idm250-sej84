
<?php
require_once __DIR__ . '/auth.php';

if (!is_logged_in()) {
  header('Location: ' . dirname($_SERVER['PHP_SELF'], 2) . '/user/login.php');
  exit;
}
