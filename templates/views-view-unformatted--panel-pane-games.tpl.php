
<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
    //dpm($variables);
 	//dpm($page);
 	//dpm($view->field);
 	//dpm($view->field['field_header_image']);
 	//dpm($view->field['field_header_image']->original_value);
 	//dpm($view->field['field_description']->original_value);
 	//dpm($page['field_header_image']);
?>
<?php /*if (!empty($title)): ?>
 	<h3><?php print $title; ?></h3>
	<?php endif; */ 
?>
<div class="list-heading">
<?php
	if (!empty($view->field['field_header_image']->original_value) ) {
		print $view->field['field_header_image']->original_value;
	} else {
		print '<h1>' . $view->field['title_1']->original_value . '</h1>';
	}
?>

<?php
	if (!empty($view->field['field_description']) ) {
		print '<div class="intro-text">';
		print $view->field['field_description']->original_value;
		print '</div>';
	}
?>

</div>

<div class="fun-bg1 bg"></div>
<div class="fun-bg2 bg"></div>
<div class="fun-bg3 bg"></div>
<div class="fun-bg-title bg"></div>
<div class="fun-bg5 bg"></div>

<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
