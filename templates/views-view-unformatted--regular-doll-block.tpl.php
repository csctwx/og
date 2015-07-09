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

<div class="mtd-rd"></div>

<?php print "<h2 class='bannerdesc-rdtext'> The more the merrier! We have lots of dolls to choose from, how many will you collect? Pick the doll that best represents you, one that is your total opposite or both. Grow your collection.  </h2>"; ?>



<div class="grid-wrapper clearfix">
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
</div>



</div>