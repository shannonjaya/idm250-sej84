<?php
require_once './lib/inventory.php';
$inventory = get_all_inventory($connection);
?>

<header class="main-header">
    <h1 class="main-heading">Inventory Management</h1>
    <button type="submit" form="mpl-form" class="primary-btn">Create MPL</button>
</header>

<form id="mpl-form" method="post" action="?view=create-mpl">
    <table>
        <thead>
            <tr>
                <th></th>
                <th>Unit ID</th>
                <th>SKU</th>
                <th>Description</th>
                <th>UOM</th>
                <th>Date Received</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inventory as $unit): ?>
                <tr>
                    <td>
                        <input type="checkbox" name="unit_ids[]" value="<?=$unit['id']; ?>">
                    </td>
                    <td><?=$unit['unit_id']; ?></td>
                    <td><?=$unit['sku']; ?></td>
                    <td><?=$unit['description']; ?></td>
                    <td>
                        <p class="highlight<?php 
                            if ($unit['uom'] === 'PALLET') { echo "-green"; } 
                            elseif ($unit['uom'] === 'BUNDLE') { echo "-blue"; }
                            elseif ($unit['uom'] === 'PC') { echo "-gray"; }
                        ?>">
                            <?= $unit['uom'] === 'PC' ? 'PIECE' : $unit['uom']; ?>
                        </p>
                    </td>
                    <td><?=$unit['date_received']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
