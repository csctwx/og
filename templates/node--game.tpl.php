<?php

if ($teaser) { //if node is being displayed as a teaser
?>
<?php
	//TODO:EIE: DRY this template up.
?>

	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	  <?php print render($title_prefix); ?>
	  <?php if (!$page && $title): ?>
		<h2<?php print $title_attributes; ?>>
			<?php 
			if ($field_is_ajax && $field_is_ajax['und']['0']['value'] == 1) { 
			?>
				<a href="<?php print $node_url; ?>"><?php print $title; ?></a>
			<?php } else { ?>
				<a href="<?php print $field_feature_url['und']['0']['value']; ?>"><?php print $title; ?></a>
			<?php } ?>
		</h2>
	  <?php endif; ?>
	  <?php print render($title_suffix); ?>
	
	  <?php if ($unpublished): ?>
		<div class="unpublished"><?php print t('Unpublished'); ?></div>
	  <?php endif; ?>
	
	  <?php if ($display_submitted): ?>
		<div class="submitted">
		  <?php print $submitted; ?>
		</div>
	  <?php endif; ?>
	
	  <div class="content"<?php print $content_attributes; ?>>
		<?php
		  // We hide the comments and links now so that we can render them later.
		  hide($content['comments']);
		  hide($content['links']);
		  print render($content);
		?>
	  </div>
	</div><!-- /.node -->

<?php
} elseif ($page) { //if node is being displayed as a full node
?>

	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	  <?php print render($title_prefix); ?>
	  <?php if (!$page && $title): ?>
		<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
	  <?php endif; ?>
	  <?php print render($title_suffix); ?>
	
	  <?php if ($unpublished): ?>
		<div class="unpublished"><?php print t('Unpublished'); ?></div>
	  <?php endif; ?>
	
	  <?php if ($display_submitted): ?>
		<div class="submitted">
		  <?php print $submitted; ?>
		</div>
	  <?php endif; ?>
	
	  <div class="content"<?php print $content_attributes; ?>>
		<?php
		  // We hide the comments and links now so that we can render them later.
		  hide($content['comments']);
		  hide($content['links']);
		  print render($content);
		?>
	  </div>
	</div><!-- /.node -->
	
<?php
} else { //all other cases
?>
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
	  <?php print render($title_prefix); ?>
	  <?php if (!$page && $title): ?>
		<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
	  <?php endif; ?>
	  <?php print render($title_suffix); ?>
	
	  <?php if ($unpublished): ?>
		<div class="unpublished"><?php print t('Unpublished'); ?></div>
	  <?php endif; ?>
	
	  <?php if ($display_submitted): ?>
		<div class="submitted">
		  <?php print $submitted; ?>
		</div>
	  <?php endif; ?>
	
	  <div class="content"<?php print $content_attributes; ?>>
		<?php
		  // We hide the comments and links now so that we can render them later.
		  hide($content['comments']);
		  hide($content['links']);
		  print render($content);
		?>
	  </div>
	</div><!-- /.node -->
	
<?php
}
?>
