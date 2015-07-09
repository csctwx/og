<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 //dpm($variables);
 	//dpm($view->field['field_deco']);
 	//dpm($view->field);
 	//dpm($view->field['field_header_image']->original_value);
 	//dpm($view->field['field_description']->original_value);
 	//dpm($page['field_header_image']);
?>

<?php
	//if (!empty($view->field['field_deco']) ) {
	//	print $view->field['field_deco']->original_value;
	//}
?>
<div class="clearfix deco-wrapper">
<div class="mtd-bg1-dd bg"></div>
<div class="mtd-bg2-bird bg"></div>
<div class="mtd-bg3 bg"></div>


<div class="mtd-dd"></div>

<?php print "<h2 class='bannerdesc-ddtext'> How big is your imagination? Be an adventuress, a detective, a circus performer, an astronaut 
or just the most magical girl in the world. Every deluxe doll comes with a story book and 
accessories to act out the story. Read your way into a brand new world or make up your own 
story and don’t forget to bring your dolls and friends along for the ride
. </h2>"; ?>


<div class="grid-wrapper clearfix">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
</div>





</div>