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
	//dpm($fields['title']);
    //dpm($variables);
    //dpm($row);
	//dpm(get_defined_vars());
?>

<?php
//added by Josh, 9.24.11
$this_category = $fields['field_category']->content;
//dsm($this_category);
$view = views_get_view_result('list_accessories', 'panel_pane_accessories', $this_category);
//dsm($view);
$accessories_list_array = array();
$search_string = '/accessories/'; //change here to find a different content type
foreach ($view as $view_item){
	$id = $view_item->node_field_data_field_accessories_nid;
	$url = url('node/'.$id);
	if (strpos($url, $search_string)!==false){
		array_push($accessories_list_array, $id);
		}
	}
//dsm($accessories_list_array);
$this_nid = $fields['nid']->content;
$key = array_search($this_nid, $accessories_list_array);
if ($key == 0)
	$prev_url = url('node/'.$accessories_list_array[count($accessories_list_array)-1]);
else {
	$prev_index = $key-1;
	$prev_url = url('node/'.$accessories_list_array[$prev_index]);
	}
if ($key == count($accessories_list_array)-1){
	$next_url = url('node/'.$accessories_list_array[0]);
	}
else {
	$next_index = $key+1;
	$next_url = url('node/'.$accessories_list_array[$next_index]);
	}
?>


<?php

print '<div class="left-arrow arrow-link"><a href="'.$prev_url.'"></a></div>';

?>

<div class='center-content-wrapper'>
<div class='center-content'>

	<div class='doll-col doll-left accessory-left'>

		<div class="doll-title acc-title">
			<?php
			if (!empty($fields['field_decoration_image']->content)) {
				print '<div class="deco">' . $fields['field_decoration_image']->content . '</div>';
			}

			if (!empty($fields['field_category']->content)) {
				print '<h2>' . $fields['field_category']->content . '</h2>';
			} 

			if (!empty($fields['field_header_image']->content)) {
				print $fields['field_header_image']->content;
			} else {
				if (!empty($fields['field_title_break']->content)){
					print "<div style='width: 900px'><h1>{$fields['field_title_break']->content}</h1></div>";
				}
				else {print $fields['title']->content;}
			}

			if (!empty($fields['field_subtitle']->content)) {
				print '<h3>' . $fields['field_subtitle']->content . '</h3>';
			}
			?>
		</div><!-- /doll-title -->


		<div class='text'>
		<?php		
				if (!empty($fields['field_description']->content)) {
					print $fields['field_description']->content;
				}

			if (!empty($fields['field_signature']->content)) {
				print $fields['field_signature']->content;
			}
		?>
		</div> <!-- /text -->
		<div class="contains-thumbnail">
			<?php
			//if (!empty($fields['field_image1']->content)) {
			//	print $fields['field_image1']->content;
			//} 

			if( !empty($fields['field_comes_with_image']->content) ){
				if( !empty($fields['field_comes_w_popover']->content) ){
					print "<div class='deluxe-sidebar' id='doll-outfit'><a href='" . $fields['field_comes_w_popover']->content . "' rel='shadowbox'>".$fields['field_comes_with_image']->content."</a></div>";
				} else {
					print "<div class='deluxe-sidebar' id='doll-comes-with'>".$fields['field_comes_with_image']->content."</div>";
				}
			}

			?>
		</div>
	</div> <!-- /doll-left -->

	<div class='accessory-main'>
	<div class='accessory-main-content'>
	
	<?php
		if (!empty($fields['field_primary_image']->content)) {
			print $fields['field_primary_image']->content;
		}
	?>
	<div class='accessory-center'>&nbsp;
		<div class='rating'>
		<?php 
			print "<img class='rating-label' src='/" . path_to_theme() . "/images/acc-rate-label.png' />";
			if (!empty($fields['field_insignia']->content)) {
				print $fields['field_insignia']->content;
			} else {
				print "<img class='default-insignia' src='/" .  path_to_theme() . "/images/rate-default-insignia.png' />";
			}
		?>
		
		<?php
		//get the fivestar aggregate total
		$active_star = $fields['value']->raw;
		$clean_vote_val = round($active_star/20);
		?>

		<div class="five-star-wrapper active-<?php print $clean_vote_val;?>">
			<?php
			//if (!empty($fields['field_rating']->content)) {
				//print render($fields['field_rating']->content);
				
				print render($fields['field_rating']->content);
			//}
			?>
		</div>
			
		</div>
	</div>

	<div class='accessory-right'>	
		<?php

		if (!empty($fields['field_secondary_headline']->content)) {
			print "<h2 class='secondary-header'>" . $fields['field_secondary_headline']->content . "</h2>";	
		} else {
			print "<h2 class='secondary-header'>Includes</h2>";	
		}
		?>
		<div class='text small-text'>
			<?php
			if (!empty($fields['field_secondary_description']->content)) {
				print $fields['field_secondary_description']->content;
			}
			?>
		</div>
		<?php
			print "<div class='buy-links live-buy-links curly'><a href='/pages/where' class='buy-where'></a>";
				print "<div class='centered-links'>";
				if (!empty($fields['field_buy_links'])){
					print $fields['field_buy_links']->content;
				}
				print "</div>";
			print "</div>";
			?>
	</div>
	
	<div class="mag-wrapper">
		
		<?php if (!empty($fields['field_rollover_1']->content)): ?>
		<? endif; ?>
		
		<?php if (!empty($fields['field_rollover_1_1']->content)): ?>
		<? endif; ?>
		
		<?php if (!empty($fields['field_rollover_1_2']->content)): ?>
		<? endif; ?>
		
		<?php if (!empty($fields['field_rollover_1_3']->content)): ?>		
		<? endif; ?>
		
		<?php if (!empty($fields['field_rollover_1']->content)): ?>	
		<div class="roll ul">
		<div class="mag ul">
			<div class="bg"></div>
			<div class="img"><?php print $fields['field_rollover_1']->content?></div>
				<div class="btn"><?php print $fields['view_node']->content?></div>
		</div>
		</div>
		<? endif; ?>
		<?php if (!empty($fields['field_rollover_1_1']->content)): ?>			
			<div class="roll ur">
			<div class="mag ur">
				<div class="bg"></div>
				<div class="img"><?php print $fields['field_rollover_1_1']->content?></div>
				<div class="btn"><?php print $fields['view_node_1']->content?></div>
			</div>
			</div>
		<? endif; ?>
		<?php if (!empty($fields['field_rollover_1_2']->content)): ?>	
			<div class="roll lr">
			<div class="mag lr">
				<div class="bg"></div>
				<div class="img"><?php print $fields['field_rollover_1_2']->content?></div>
				<div class="btn"><?php print $fields['view_node_2']->content?></div>
			</div>
			</div>
		<? endif; ?>
		<?php if (!empty($fields['field_rollover_1_3']->content)): ?>	
			<div class="roll ll">
			<div class="mag ll">
				<div class="bg"></div>
				<div class="img"><?php print $fields['field_rollover_1_3']->content?></div>
				<div class="btn"><?php print $fields['view_node_3']->content?></div>
			</div>
			</div>
		<? endif; ?>
	</div>
	
	</div> <!-- /accessory-main-content -->

	</div> <!-- /accessory-main -->


</div> <!-- /center-content -->
</div> <!-- /center-content-wrapper -->
 
	<?php
if (!empty($fields['field_related']->content)) {	

	print " <div class='doll-related clearfix'>";
	print " 	<div class='full-section clearfix'>";

	if (!empty($fields['field_related_headline']->content)) {
		print "<h3>" . $fields['field_related_headline']->content . "</h3>";
	} else {
		print "<h3>Check these out:</h3>";
	}
	
	print "			<div class='deco first'></div>";
	
	print "<div class='related-box-wrapper'>";
	print $fields['field_related']->content;
	print "</div>";
	
	print " 		<div class='deco last'></div>";
	print " 	</div>";
	print " </div>";

}

	print '<div class="right-arrow arrow-link"><a href="'.$next_url.'"></a></div>';
	

?>



