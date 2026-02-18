<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once "../lib/db-connect.php";
require_once "../lib/auth.php";
require_once "../lib/functions.php";

check_api_key($env);

$method = $_SERVER['REQUEST_METHOD'];
$id = intval($_GET['id'] ?? 0);

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Bad Request', 'details' => 'Missing SKU ID']);
    exit;
}

if ($method === 'GET') {
    $sku = get_sku($connection, $id);

    if ($sku) {
        echo json_encode(['success' => true, 'data' => $sku]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'SKU not found']);
    }
}

