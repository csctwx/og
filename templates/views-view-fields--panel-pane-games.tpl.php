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
    //dpm($fields['field_feature_url']);
    //dpm($fields);
    //dpm($variables);
    //dpm($row);
	//dpm(get_defined_vars());
?>

<?php

$divOpen = "<div class='node node-acat node-teaser node-grid ";
if (!empty($fields['field_extra_classes']->content) ) :
	$divOpen .= $fields['field_extra_classes']->content;
endif;
$divOpen .= "'>";
	
print $divOpen;

	print "<div class='content'>";

	if (!empty($fields['field_back_spangle']->content) ) {
	  print $fields['field_back_spangle']->content;
	};
	
	if (!empty($fields['field_grid_image']->content) ) {
		print "<div class='grid-image'>";
		
			if (!empty($fields['field_load_ajax']) && $fields['field_load_ajax']->content == "No") {
				print '<a href="'. $fields['field_feature_url']->content .'">';
			} else {
				print '<a href="'. $fields['path']->content  .'">';
			}
					print $fields['field_grid_image']->content;
				print '</a>';

			print '<div class="center-button curly">';
			if (!empty($fields['field_load_ajax']) && $fields['field_load_ajax']->content == "No") {
				print '<a href="'. $fields['field_feature_url']->content .'">';
				print $fields['title']->raw;
				print '</a>';
			} else {
				print $fields['title']->content;
			}

			print '</div>';		
		print "</div>";
	};

	if (!empty($fields['field_text']->content) ) {
	  print "<p>". $fields['field_text']->content ."<p>";
	};
	
	if (!empty($fields['field_front_spangle']->content) ) {
	  print $fields['field_front_spangle']->content;
	};

	
	
//	if (!empty($fields['field_extra_classes']->content) ) :
//	  print $fields['field_extra_classes']->content;
//	endif;

	
	print "</div>";

print "</div>";

?>


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
   // dpm($fields['title']->content);
    //dpm($variables);
    //dpm($row);
	//dpm(get_defined_vars());
?>

<?php
/*
// TODO: Put Date Here!

$divOpen = "<div class='node node-acat node-teaser node-grid ";
if (!empty($fields['field_extra_classes']->content) ) :
	$divOpen .= $fields['field_extra_classes']->content;
endif;
$divOpen .= "'>";
	
print $divOpen;

	print "<div class='content'>";

	if (!empty($fields['field_back_spangle']->content) ) :
	  print $fields['field_back_spangle']->content;
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

	print '<div class="center-button curly">aaaaaaa';
	print $fields['title']->content;
	print '</div>';
	
//	if (!empty($fields['field_extra_classes']->content) ) :
//	  print $fields['field_extra_classes']->content;
//	endif;

	
	print "</div>";

print "</div>";

?>
*/
?>