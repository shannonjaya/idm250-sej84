<?php

// API KEY
require_once __DIR__ . '/db-connect.php';
function check_api_key($env) {
    $valid_api_key = $env['X_API_KEY'];
    $headers = getallheaders();
    $provided_key = null;
    
    foreach ($headers as $name => $value) {
        if(strtolower($name) === 'x-api-key') {
            $provided_key = $value;
            break;
        }
    }
    if ($provided_key !== $valid_api_key) {
        http_response_code(401);
        echo json_encode(['error' => 'Unauthorized', 'details' => 'Invalid API Key']);
        exit();
    }
}

// SESSIONS
session_start();

$USERS = [
  [
    'email' => 'admin@camfg.com',
    'password' => 'admin123'
  ]
];

function login_user($email, $password) {
  global $USERS;

  foreach ($USERS as $user) {
    if ($user['email'] === $email && $user['password'] === $password) {
      $_SESSION['user'] = [
        'email' => $email
      ];
      return true;
    }
  }
  return false;
}

function is_logged_in() {
  return isset($_SESSION['user']);
}

function logout_user() {
  session_destroy();
}
