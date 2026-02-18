<?php

// GET ALL INVENTORY
function get_all_inventory($connection) {
    $stmt = $connection->prepare("SELECT * FROM idm250_inventory");
    $stmt->execute();
    $result = $stmt->get_result();
    $inventory = $result->fetch_all(MYSQLI_ASSOC);

    return $inventory;
}
