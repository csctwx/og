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
	if (!empty($fields['field_video_file']->content) ) :
		print $fields['field_video_file']->content;
	endif;	
	
	$video_url = drupal_html_to_text($fields['field_video_url']->content);
	$video_thumbnail = drupal_html_to_text($fields['field_video_thumbnail']->content);
	$video_title = drupal_html_to_text($fields['title']->content);
	

	if (!empty($video_url) ) :	
	    //$video_url = $fields['field_video_url']->content;
	    $img_src = '';
	    if (!empty($video_thumbnail) ) :				
			$img_src = $video_thumbnail;
		else:
			$youtube_id = substr($video_url, strrpos($video_url, '/') + 1);
		    $img_src = "http://img.youtube.com/vi/$youtube_id/mqdefault.jpg"; 
		endif;	
		$title = $video_title;			
	    $video_link = '<a href="'.$video_url.'"><img src="'.$img_src.'" alt="'.$title.'"/></a>';
		print $video_link;
		//kpr($video_link); die();
	endif;	

	

?>

