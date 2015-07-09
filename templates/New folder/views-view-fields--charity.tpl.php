<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
    //dpm($fields);
    //dpm($view->field['field_video']->last_render);
    //dpm($variables);
    //dpm($view);
	//dpm(get_defined_vars());
?>

<?php
	/*
	if (!empty($view->field['field_header_image']->original_value) && empty($view->field['field_override_header'] == 'true') ) {
		print $view->field['field_header_image']->original_value;
	} else if (!empty($view->field['field_header_image']->original_value) && !empty($view->field['field_override_header']) ) {
		print $view->field['field_header_image']->original_value;
		print '<h1>' . $view->field['title']->original_value . '</h1>';
	} else {
		*/

	if (!empty($view->field['field_header_image']->original_value)) {
		print "<div class='header-image'>";
		print $view->field['field_header_image']->original_value;
		print "</div>";
	}

	if ($view->field['field_override_header']->original_value !='true') {
		print '<h1>' . $view->field['title']->original_value . '</h1>';
	}
?>

<?php	
	print "<div class='content'>";

	if (!empty($fields['body']->content) ) :
	  print $fields['body']->content;
	endif;
	
	if (!empty($fields['field_grid_image']->content) ) :
		print "<div class='grid-image'>";
		print $fields['field_grid_image']->content;
		print "</div>";
	endif;
	if (!empty($fields['field_text']->content) ) :
	  print "<p>". $fields['field_text']->content ."<p>";
	endif;
	
	if (!empty($fields['field_front_spangle']->content) ) :
	  print $fields['field_front_spangle']->content;
	endif;


	//print $fields['field_video']->content;

?>

<?php
	if (!empty($fields['field_gallery_images']->content) ) :	
	print '<div class="basic-image-grid">';
		print $fields['field_gallery_images']->content;
	print '</div>';
	endif;
?>
<?php 
	
	//	if (!empty($fields['field_extra_classes']->content) ) :
	//	  print $fields['field_extra_classes']->content;
	//	endif;
	
	print "</div>";

?>
