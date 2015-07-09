
<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
	
	//dpm($variables);
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

<div class="clearfix deco-wrapper">

<div class="list-heading">
<?php
	if (!empty($view->field['field_header_image']->original_value) ) {
		print $view->field['field_header_image']->original_value;
	} else {
		print '<h1>Accessories</h1>';

		// EIE: Quick fix for this template bug was to just hardcode it
		//print '<h1>' . $view->field['title']->original_value . '</h1>';
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

<div class="acat-bg1 bg"></div>
<div class="acat-bg2 bg"></div>
<div class="acat-bg3 bg"></div>

<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>

<div class="acat-fg1 fg"></div>
<div class="acat-fg2 fg"></div>
<div class="acat-fg3 fg"></div>
</div>