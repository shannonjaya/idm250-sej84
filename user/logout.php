<?php
require_once '../lib/auth.php';

logout_user();
header('Location: ../user/login.php');
exit;
