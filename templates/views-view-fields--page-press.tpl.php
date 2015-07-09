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
    //dpm($variables);
    //dpm($row);
	//dpm(get_defined_vars());
?>

<?php



	print "<div class='content'>";

	print "<div class='press-wrapper clearfix'>";
		
		print "<div class='press-image'>";
		if (!empty($fields['field_image']->content) ) :
			print $fields['field_image']->content;
		endif;
		print "</div>";
		
		print "<div class='press-content'>";	
		if (!empty($fields['title']->content) ) :
			print $fields['title']->content;
		endif;

		if (!empty($fields['field_source_type']->content) ) :
			print "<span class='meta'>" . $fields['field_source_type']->content . "</span>";
		endif;

		if (!empty($fields['body']->content) ) :
			print $fields['body']->content;
		endif;


		print "</div>";
			
	print "</div>";
	
//	if (!empty($fields['field_extra_classes']->content) ) :
//	  print $fields['field_extra_classes']->content;
//	endif;

	
	print "</div>";


?>
