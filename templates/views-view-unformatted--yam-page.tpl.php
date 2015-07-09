
<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 	dpm($variables);
 	//dpm($view->field['field_decoration_image']->original_value);
 	//dpm($view);
 	//dpm($view->field['field_header_image']->original_value);
 	//dpm($view->field['field_description']->original_value);
 	//dpm($page['field_header_image']);
?>

<div class="clearfix deco-wrapper grid-wrapper plain-grid">

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

<div class="acc-bg1 bg"></div>
<!--<div class="acc-bg2 bg"></div>-->
<div class="acc-bg3 bg"></div>
<div class="acc-bg4 bg"></div>
<div class="acc-bg5 bg"></div>

<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>

<div class="acc-fg1 fg"></div>

<?php
if ( !empty($view->field['field_decoration_image']->original_value) ){
	print '<div class="acc-fg2 fg" style="background-image:url(' . $view->field['field_decoration_image']->original_value . ')"></div>';
} else {
	print '<div class="acc-fg2 fg"></div>';
}
?>

</div>