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
<div class="mtd-bg1 bg"></div>
<div class="mtd-bg2 bg"></div>
<div class="mtd-bg3 bg"></div>

<div class="mtd-retd"></div>

<?php print "<h2 class='bannerdesc-retdtext'> Meet all our retro dolls! Take a peek into the past. We’re all about fashion and fun. We are collectible too. How many dolls can you collect? Dive into the past and bring another doll into your future. </h2>"; ?>

<div class="grid-wrapper clearfix">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
</div>




</div>