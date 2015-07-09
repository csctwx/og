<?php if (count($rows) > 0): ?>

<div class="ribbon-top">
<h2 class="pane-title">Mail Archive</h2>
</div>

<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>

<?php endif; ?>