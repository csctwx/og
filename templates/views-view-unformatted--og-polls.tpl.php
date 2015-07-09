<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */

?>
<?php if (!empty($title)): ?>
	<h1><?php print $title; ?></h1>
<?php else: ?>
	<h1>OG Polls</h1>
<?php endif; ?>

<div class="polls-bg1 bg">&nbsp;</div>
<div class="polls-bg2 bg">&nbsp;</div>

<div class="intro-text game-description">
	<?php
		$block = module_invoke('block', 'block_view', '8');
		print $block['content'];
	?>
	<!--
	In between helping the planet and each other, and making all our own dreams come true, 
	we girls always find time for fun. That's what being a kid is all about, after all.
	-->
</div>

<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>

<style>
@import "/sites/all/themes/og/js/jquery.checkbox/jquery.checkbox.css";
</style>

<script src="/sites/all/themes/og/js/jquery.checkbox/jquery.checkbox.min.js"></script>

<script>
jQuery(document).ready(function() {
	jQuery('input:radio').checkbox();
	jQuery('.form-submit').addClass('curly');
	log(jQuery('.poll-results').parent().parent().find('h4').hide() );
	
	if (jQuery("div.vote-form").is(':visible')){
		jQuery("div.vote-form").parent().parent().parent().parent().find(".poll-results").hide();
		jQuery("div.vote-form").parent().parent().parent().parent().find(".poll-results").removeClass("closed-poll");
		jQuery("div.vote-form").parent().parent().parent().parent().find(".poll-results").activeClass("active-poll");
	}
});	
</script>