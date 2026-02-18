<?php
require_once __DIR__ . '/../lib/db-connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$api_url = "http://localhost:8888/idm250-sir/api/sku.php?id=$id";
$api_key = $env['X_API_KEY'];

$options = [
    'http' => [
        'method' => 'GET',
        'header' => "X-API-KEY: $api_key\r\n" . "Content-Type: application/json\r\n"
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($api_url, false, $context);

$sku = null;
$error = null;

if ($response === false) {
    $error = "Error fetching SKU from API.";
} else {
    $data = json_decode($response, true);
    if (isset($data['success']) && $data['success'] === true) {
        $sku = $data['data'];
    } else {
        $error = $data['error'] ?? 'Unknown error';
    }
}
?>

<header class="main-header">
    <h1 class="main-heading">SKU API Demo</h1>
</header>

<?php if ($error): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php elseif ($sku): ?>
    <ul>
        <li><strong><?php echo htmlspecialchars($sku['sku']); ?></strong> - <?php echo htmlspecialchars($sku['description']); ?></li>
    </ul>
<?php else: ?>
    <p>No SKU found.</p>
<?php endif; ?>
