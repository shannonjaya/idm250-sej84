
<?php
require_once __DIR__ . '/auth.php';

if (!is_logged_in()) {
  header('Location: ../idm250-sir/user/login.php');
  exit;
}
