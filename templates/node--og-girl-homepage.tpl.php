<?php 
	//dpm($node); 
	//dpm($title);
	//dpm($node->title);
?>

<div class="girl_wrapper">

<h1><?php print $title ?></h1>
<h2 class='subhead'>
	<?php print $node->field_oggirls_subhead['und'][0]['safe_value'];?>
</h2>


<?php if (!(empty($node->body))):?>
<div class="description top-description">
	<?php print $node->body['und'][0]['value'];?>
</div>
<?php endif; ?>


<?php if (!(empty($node->field_featured_girl))):?>
<div class='feature_1'>
	<?php 
	$node_primary = node_load($node->field_featured_girl['und'][0]['nid']);
	
	if (!(empty($node_primary->field_primary_image))):?>
		<?php 
			/* <a href="<?php print url('node/' . $node_primary->nid); ?>"> */ 
			$slug = strtolower(preg_replace('/\s/', '-',  $node_primary->title));
		?>
		<a href="<?php print '/og-girls/' . $slug; ?>">
		<img src="<?php print file_create_url($node_primary->field_primary_image['und'][0]['uri']);?>" />
		</a>
	<?php endif;?>

</div>
<?php endif;?>

	
<?php if (!(empty($node->field_oggirls_caption))):?>
<div class='caption'>
	<?php print $node->field_oggirls_caption['und'][0]['safe_value'];?>
</div>
<?php endif;?>


<?php if (!(empty($node->field_oggirls_form))):?>
<div class='submission-form-cloud'>
	<!-- <a href="<?php print file_create_url($node->field_oggirls_form['und'][0]['filename']);?>"></a> -->
	<a href="/sites/public/<?php print $node->field_oggirls_form['und'][0]['filename'];?>"></a>
</div>
<?php endif;?>

<div class="more_amazing"></div>

</div>



<div class='more_girls clearfix'>
<div class="purple_felt">
	<div class='girl_wrapper clearfix'>
	
<?php 
foreach ($node->field_girls['und'] as $girl) {

	if (!(empty($girl['nid']))){
		$node_secondary = node_load($girl['nid']);
		
		if (!(empty($node_secondary->field_primary_image_thumbnail))):
?>
		
		<div class='amazing_girl'>
			<div class='image'>
				<?php $slug = strtolower(preg_replace('/\s/', '-',  $node_secondary->title)); 
				/*<a href="<?php print url('node/'.$girl['nid']);?>">*/
				?>
				<a href="<?php print '/og-girls/' . $slug; ?>">
					<img src="<?php print file_create_url($node_secondary->field_primary_image_thumbnail['und'][0]['uri']);?>" />
				</a>
			</div>
			<h3 class='link'>
				<a href="<?php print url('node/'.$girl['nid']);?>"><?php print $node_secondary->title;?></a>
			</h3>
			<div class="description">
				<?php
				if ( !empty($node_secondary->body['und']['0']['summary']) ){
					print $node_secondary->body['und']['0']['summary'];
				} else {
					print $node_secondary->body['und']['0']['value'];
				}
				?>
			</div>
		</div>
		
		
		<?php endif;?>
<?php
	}
}
?>
	</div>
</div> <!-- /.purple_felt -->
</div> <!-- /.more_girls -->
	
	



