<?php
require_once './lib/functions.php';
$inventory = get_all_inventory_units($connection);
?>

<header class="main-header">
    <h1 class="main-heading">Inventory Management</h1>
    <button type="submit" form="mpl-form" class="primary-btn">Create MPL</button>
</header>

<form id="mpl-form" method="post" action="?view=create-mpl">
    <table>
        <thead>
            <tr>
                <th>Select</th>
                <th>Unit ID</th>
                <th>SKU</th>
                <th>Description</th>
                <th>UOM</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($inventory as $unit): ?>
                <tr>
                    <td>
                        <input type="checkbox" name="unit_ids[]" value="<?=$unit['unit_id']; ?>">
                    </td>
                    <td><?=$unit['unit_id']; ?></td>
                    <td><?=$unit['sku']; ?></td>
                    <td><?=$unit['description']; ?></td>
                    <td>
                        <p class="highlight<?php 
                            if ($unit['uom_primary'] === 'PALLET') { echo "-green"; }
                        ?>">
                            <?=$unit['uom_primary']; ?>
                        </p>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
