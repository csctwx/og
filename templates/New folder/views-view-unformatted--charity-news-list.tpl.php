<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php
    //dpm($view->field['field_video']->last_render);
    //dpm($variables);
    //dpm($view);
	//dpm(get_defined_vars());
?>


<div class='header-image'>
	<a href='/free-the-children'>
	<img src="/sites/all/themes/og/images/free_title.png" />
	</a>
</div>

<?php if (!empty($title)): ?>
  <h1><?php print $title; ?></h1>
<?php else: ?>
  <h1>Free the Children News</h1>
<?php endif; ?>

<?php if (!empty($title)): ?>
  <!--<h3><?php print $title; ?></h3>-->
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
