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
    //dpm($fields['field_buy_links']);
    //dpm($variables);
    //dpm( file_create_url($fields['field_comes_w_popover']->content) );
    //dpm( ($fields['field_comes_w_popover_1']->content) );
?>

<?php
//added by Josh, 9.24.11
$view = views_get_view_result('dolls_list', 'pane_meet');
//dsm($view);
$dolls_list_array = array();
$search_string = '/dolls/'; //change here to find a different content type
foreach ($view as $view_item){
	$id = $view_item->node_field_data_field_doll_list_nid;
	$url = url('node/'.$id);
	if (strpos($url, $search_string)!==false){
		//$dolls_list_array[$id]=$url;
		array_push($dolls_list_array, $id);
		}
	}
//dsm($dolls_list_array);
$this_nid = $fields['nid']->content;
$key = array_search($this_nid, $dolls_list_array);
if ($key == 0)
	$prev_url = url('node/'.$dolls_list_array[count($dolls_list_array)-1]);
else {
	$prev_index = $key-1;
	$prev_url = url('node/'.$dolls_list_array[$prev_index]);
	}
if ($key == count($dolls_list_array)-1){
	$next_url = url('node/'.$dolls_list_array[0]);
	}
else {
	$next_index = $key+1;
	$next_url = url('node/'.$dolls_list_array[$next_index]);
	}
?>

<?php

// TODO: Put Date Here!
print '<div class="top-ribbon">&nbsp;</div>';
print '<div class="left-arrow arrow-link"><a href="'.$prev_url.'"></a></div>';

?>

<div class='center-content-wrapper'>
<div class='center-content'>
<div class='doll-col doll-left'>

	<div class="doll-title">
		<?php
		if (!empty($fields['field_decoration_image']->content)) {
			print '<div class="deco">' . $fields['field_decoration_image']->content . '</div>';
		}

		if (!empty($fields['field_deluxe_title']->content)) {
			print '<h2>' . $fields['field_deluxe_title']->content . '</h2>';
		} 

		if (!empty($fields['field_header_image']->content)) {
			print $fields['field_header_image']->content;
		} else {
			print '<h1>' . $fields['title']->content . '</h1>';
		}

		if (!empty($fields['field_subtitle']->content)) {
			print '<h3>' . $fields['field_subtitle']->content . '</h3>';
		}

		?>
	</div>

<?php
	print "		<div class='text'>";
			
			if (!empty($fields['field_description']->content)) {
				print $fields['field_description']->content;
			}

	if (!empty($fields['field_signature']->content)) {
		print $fields['field_signature']->content;
	}
	print "		</div>";
	print "		<div class='heart-links'>";
	print "			<div class='doll-add-heart'><a href='/games/draw-heart'>&nbsp;</a></div>";
	print "			<div class='doll-heart'>";
	if (!empty($fields['field_heart_link']->content)) {
		print "		<a href='" . $fields['field_heart_link']->content . "'>";
	} else {
		print "		<a href='/games/wall-of-hearts'>";
	}
					if (!empty($fields['field_doll_heart']->content)) {
						print $fields['field_doll_heart']->content;
					}
	print "			</a></div>";

	print "		</div>";
	print "</div>";
	?>


	<div class='doll-col doll-center'>
		<!--<img class='big-image' src='/<?php print path_to_theme(); ?>/images/doll-main.png' />-->

		<!-- LARGE IMAGE -->
		<div class='big-image primary-image'>
		<?php
		if (!empty($fields['field_primary_image']->content)) {
			print $fields['field_primary_image']->content;
		}
		?>
		</div>

		<!-- ALT IMAGE -->
		<div class='big-image secondary-image'>
		<?php
		if (!empty($fields['field_second_image']->content)) {
			print $fields['field_second_image']->content;
		}
		?>
		</div>
	<div class='rating'>
		<img class='rating-label' src='/<?php print path_to_theme(); ?>/images/doll-rate-label.png' />
		<?php 
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

<?php
	if (!empty($fields['field_comes_with_image']->content) || !empty($fields['field_my_story_image']->content) || !empty($fields['field_outfit_image']->content) ) {
		print "<div class='deluxe-wrapper'>";
		
		if( !empty($fields['field_my_story_image']->content) ){
			if (!empty($fields['field_bookshelf_link']->content)) {
				print "<div class='deluxe-sidebar' id='doll-my-story'><a href='/bookshelf?id=". $fields['field_bookshelf_link']->content . "'>";
				print $fields['field_my_story_image']->content;
				print "</a></div>";
			} else {
				print "<div class='deluxe-sidebar' id='doll-my-story'><a href='/bookshelf'>";
				print $fields['field_my_story_image']->content;
				print "</a></div>";
			}
		}
		if( !empty($fields['field_outfit_image']->content) ){
			print "<div class='deluxe-sidebar secondary-thumb' id='doll-outfit'><a href='#change-outfit' class='toggle-image'>".$fields['field_outfit_image']->content."</a></div>";
		}
		if( !empty($fields['field_primary_thumbnail']->content) ){
			print "<div class='deluxe-sidebar primary-thumb off' id='doll-outfit'><a href='#change-outfit' class='toggle-image'>".$fields['field_primary_thumbnail']->content."</a></div>";
		}
		
		if( !empty($fields['field_comes_with_image']->content) ){
			if( !empty($fields['field_comes_w_popover_1']->content) ){
				print "<div class='deluxe-sidebar' id='doll-outfit'><a href='" . $fields['field_comes_w_popover_1']->content . "' rel='shadowbox'>".$fields['field_comes_with_image']->content."</a></div>";
			} else {
				print "<div class='deluxe-sidebar' id='doll-comes-with'>".$fields['field_comes_with_image']->content."</div>";
			}
		}
		
		print "</div>";
	} else {

		print "<div class='doll-col doll-right'>";
		
		if (!empty($fields['field_secondary_headline']->content)) {
			print "<h2 class='center secondary-header'>" . $fields['field_secondary_headline']->content . "</h2>";	
		} else {
			print "<h2 class='center secondary-header'>Here's all the <br/>great stuff I come with:</h2>";	
		}

		print "<div class='text'>";
				if (!empty($fields['field_secondary_description']->content)) {
					print $fields['field_secondary_description']->content;
				}
		print "</div>";
		
		
		print "<div class='buy-links live-buy-links curly'><a href='/pages/where' class='buy-where'></a>";
		
		print "<div class='centered-links'>";
			if (!empty($fields['field_buy_links'])){
				print $fields['field_buy_links']->content;
			}
		print "</div>";
		
		print "</div>";
		//} else {
		//	print "<div class='buy-links live-buy-links curly just-spacer'></div>";
		//}

		print "</div>";

	}

	?>

<?php 
if (!empty($fields['field_comes_with_image']->content) || !empty($fields['field_my_story_image']->content) || !empty($fields['field_outfit_image']->content) ) {
?>

<div class="full-col">
<?php
		if (!empty($fields['field_secondary_headline']->content)) {
			print "<h2 class='center secondary-header'>" . $fields['field_secondary_headline']->content . "</h2>";	
		} else {
			print "<h2 class='center secondary-header'>Here's all the great stuff I come with:</h2>";	
		}
		print "<div class='text'>";
				if (!empty($fields['field_secondary_description']->content)) {
					print $fields['field_secondary_description']->content;
				}
		print "</div>";
		//print "<div class='deluxe-label'></div>";
		
		if (!empty($fields['field_buy_links'])){
			print "<div class='buy-links live-buy-links curly'><a href='/pages/where' class='buy-where'></a>";
				print $fields['field_buy_links']->content;
			print "</div>";
		} else {
			print "<div class='buy-links live-buy-links curly just-spacer'><a href='/pages/where' class='buy-where'></a></div>";
		}
?>
</div>

<?php 
}
?>

	
</div> <!-- /center-content -->
</div> <!-- /center-wrapper -->

<?php
	print " <div class='doll-related clearfix'>";
	print " 	<div class='full-section clearfix'>";
	if (!empty($fields['field_related_headline']->content)) {
		print "<h3>" . $fields['field_realted_headline']->content . "</h3>";
	} else {
		print "<h3>Check these out:</h3>";
	}
	print "<div class='deco first'></div>";


	if (!empty($fields['field_related_list']->content)) {	
		print "<div class='related-box-wrapper'>";
		print $fields['field_related_list']->content;
		print "</div>";
	} else {
		/*
		print "<div class='related-box first'><a href='#'><img src='/" . path_to_theme() . "/images/related-prod1.png' /></a></div>";
		print "<div class='related-box'><img src='/" . path_to_theme() . "/images/related-prod2.png' /></a></div>";
		print "<div class='related-box'><a href='#'><img src='/" . path_to_theme() . "/images/related-prod3.png' /></a></div>";
		*/
	}


	print "		<div class='deco last'></div>";
	print " 	</div>";
	print " </div>";

print '<div class="right-arrow arrow-link"><a href="'.$next_url.'"></a></div>';
?>



