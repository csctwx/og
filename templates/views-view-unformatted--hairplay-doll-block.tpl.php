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
<div class="mtd-bg1-hair bg"></div>
<div class="mtd-bg2-hair bg"></div>
<div class="mtd-bg3 bg"></div>

<div class="mtd-hd"></div>

<?php print "<h2 class='bannerdesc-hdtext'> Do you like to style hair? Make it even longer so you can do even more. Braids, up dos, fishtails, ponytails or twists, the only limit is your imagination. Match your hairstyle to your dolls, have some fun and work your hair magic. </h2>"; ?>

<div class="grid-wrapper clearfix">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
</div>



</div>