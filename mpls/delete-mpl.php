<?php
require_once './lib/mpl.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id) {
    delete_mpl($connection, $id);
}
header("Location: ../idm250-sir/index.php?view=mpl");
exit;
