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
    //dpm($view->field['field_video']->last_render);
    //dpm($fields);
    //dpm($view);
	//dpm(get_defined_vars());
?>

<?php
	if (!empty($view->field['field_header_image']->original_value)) {
		print $view->field['field_header_image']->original_value;
	}
	if ($view->field['field_override_header']->original_value !='true') {
		print '<h1>' . $view->field['title']->original_value . '</h1>';
	}
?>


	<div class='content'>
	<div class='intro-text'>
<?php	
	if (!empty($fields['body']->content) ) :
	  print $fields['body']->content;
	endif;
?>
	</div>
	
	
<?php	
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
	
	<div class="where-retail-wrapper">
	<?php
		if ( !empty($fields['field_image1']->content) ) {
			print '<div class="where-retail float">';
				print '<a href="' . $fields['field_link1_1']->content . '">';
				print $fields['field_image1']->content;
				print '</a>';

				print '<div class="where-button curly">';
					print $fields['field_link1']->content;
				print '</div>';
			print '</div>';
		}
		if ( !empty($fields['field_image2']->content) ) {
			print '<div class="where-retail float">';
				print '<a href="'.$fields['field_link2_1']->content.'">';
				print $fields['field_image2']->content;
				print '</a>';

				print '<div class="where-button curly">';
					print $fields['field_link2']->content;
				print '</div>';
			print '</div>';
		}
		if ( !empty($fields['field_image3']->content) ) {
			print '<div class="where-retail float">';
				print '<a href="'.$fields['field_link3_1']->content.'">';
				print $fields['field_image3']->content;
				print '</a>';

				print '<div class="where-button curly">';
					print $fields['field_link3']->content;
				print '</div>';
			print '</div>';
		}
	?>	
	</div>

	<div class="divider clearfix">&nbsp;</div>
	<div class="filter-input">
		<h4 class="curly">Please enter your zipcode</h4>
		<div class="filter-inside">
			<div class="search-field-wrapper"><input id="zip-search" placeholder="Zip Code" type="text" value=""/></div>
			<input id="zip-submit" placeholder="zip" type="submit" value=" " />
		</div>
	</div>
	<div id="loc-results">Location Results</div>

	<script>
		//var dataURL = "<?php print $fields['field_data_url']->content; ?>";
		//var dataURL = "/ajax/stores_data_new_test.json";
		//var dataURL = "/ajax/stores_data_new2.json";
	</script>

	<script src="/sites/all/themes/og/js/stores.js?id=5"></script>

<?php 
	
	//	if (!empty($fields['field_extra_classes']->content) ) :
	//	  print $fields['field_extra_classes']->content;
	//	endif;
	
	print "</div>";

?>
