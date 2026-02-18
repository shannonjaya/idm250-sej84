<?php
require_once './lib/mpl.php';
$mpls = get_all_mpls($connection);
?>

<header class="main-header">
    <h1 class="main-heading">Material Packing List Management</h1>
    <a href="?view=create-mpl" class="primary-btn">Create MPL</a>
</header>

<table>
    <thead>
        <tr>
            <th>Reference</th>
            <th>Trailer</th>
            <th>Expected Arrival</th>
            <th>Total Units</th>
            <th>Status</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($mpls as $mpl): ?>
            <tr>
                <td><?=$mpl['reference_number']; ?></td>
                <td><?=$mpl['trailer_number']; ?></td>
                <td><?=$mpl['expected_arrival_date']; ?></td>
                <td><?=$mpl['total_units']; ?></td>
                <td>
                    <p class="highlight<?php 
                        if ($mpl['status'] === 'confirmed') { echo "-green"; }
                    ?>">
                        <?=$mpl['status']; ?>
                    </p>
                </td>
                <td><?=$mpl['created_at']; ?></td>

                <td class="col-actions">
                    <?php if ($mpl['status'] === 'draft'): ?>
                        <form action="?view=delete-mpl" method="post">
                            <input type="hidden" name="id" value="<?=$mpl['id']; ?>">
                            <button class="icon-btn" type="submit"
                                onclick="return confirm('Are you sure you want to delete MPL <?=$mpl['reference_number']; ?>?');">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <mask id="mask0_20_33" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                        <rect width="24" height="24" fill="#D9D9D9"/>
                                    </mask>
                                    <g mask="url(#mask0_20_33)">
                                        <path d="M7.30775 20.5C6.80908 20.5 6.38308 20.3234 6.02975 19.9702C5.67658 19.6169 5.5 19.1909 5.5 18.6922V5.99998H4.5V4.49998H9V3.61548H15V4.49998H19.5V5.99998H18.5V18.6922C18.5 19.1974 18.325 19.625 17.975 19.975C17.625 20.325 17.1974 20.5 16.6923 20.5H7.30775ZM17 5.99998H7V18.6922C7 18.7821 7.02883 18.8558 7.0865 18.9135C7.14417 18.9711 7.21792 19 7.30775 19H16.6923C16.7693 19 16.8398 18.9679 16.9038 18.9037C16.9679 18.8397 17 18.7692 17 18.6922V5.99998ZM9.404 17H10.9037V7.99998H9.404V17ZM13.0962 17H14.596V7.99998H13.0962V17Z"/>
                                    </g>
                                </svg>
                            </button>
                        </form>
                    <?php else: ?>
                        <span class="muted">—</span>
                    <?php endif; ?>
                </td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
