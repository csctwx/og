<?php
    /*
    dpm($fields);
    dpm($row);
	dpm(get_defined_vars());
	*/
?>

<script>var nodeID = <?php print $fields['nid']->raw ?>; activePath.push('OG Girls');</script>
<div class="ogg-deco-title bg" style="background-image:url(<?php print $fields['field_decoration_image']->content ?>)"></div>
<h1 class="real-title"><?php print $fields['field_story_headline']->content ?></h1>

<div class="ogg-bg-1 bg"></div>

<div class="ogg-image">
<?php print $fields['field_primary_detail']->content ?>
<div class="ogg-fg-3 fg"></div>
</div>

<div class="ogg-intro">
	<?php print $fields['field_story_intro']->content ?>
</div>

<div class="ogg-divider"></div>

<div class="ogg-body">
	<div class="ogg-fg-4 fg"></div>
	<?php print $fields['body']->content ?>
	
	<div class="heart-it">
		<div class="heart-it-num curly">
		<?php 
			if (!empty($fields['field_heart_its']->content) ){
				print $fields['field_heart_its']->content;
			} else {
				print "0";
			}
		?>
		</div>
		<div class="heart-it-inner clearfix">
			<?php if ($fields['field_heart_it_headline']->content){ ?>
				<h3><?php print $fields['field_heart_it_headline']->content ?>?</h2>
			<?php } else { ?>
				<h3><?php print $fields['field_story_headline']->content ?>?</h2>
			<?php } ?>
			
			<div class="heart-it-button">&nbsp;</div>
		</div>
	</div>
	
</div>

<div class="ogg-fg-2 fg"></div>

