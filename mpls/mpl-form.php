<?php
?>
<header class="main-header">
    <h1>Create Material Packing List</h1>
</header>

<form method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <fieldset class="row">
        <legend>Material Packing List Details</legend>
        <div class="form-item">
            <label for="reference-number">Reference Number</label>
            <input type="number" min="0" id="reference-number" name="reference-number"  value="<?= ($mpl['reference_number']) ?? ''; ?>" placeholder="000" required>
        </div>
        <div class="form-item">
            <label for="trailer-number">Trailer Number</label>
            <input type="number" min="0" id="trailer-number" name="trailer-number"  value="<?= ($mpl['trailer_number']) ?? ''; ?>" placeholder="000" required>
        </div>
    </fieldset>
            
    <fieldset class="row">
        <legend>Inventory Units</legend>
        <div class="form-item">
            <label for="inventory-units">Inventory Units</label>
        </div>
        <legend>Expected Arrival Date</legend>
        <div class="form-item">
            <label for="expected-arrival-date">Expected Arrival Date</label>
            <input type="date" id="expected-arrival-date" name="expected-arrival-date" value="<?= ($mpl['expected_arrival_date']) ?? ''; ?>" required>
        </div>
    </fieldset>

    <div class="btn-wrapper"><button type="submit" class="primary-btn"><?php echo isset($_GET['id']) ? 'Edit ' : 'Create '; ?>MPL</button></div>
</form>
