<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
      <?php foreach ($items as $delta => $item) : ?>
        <div class="hidden" id="ajax-feature" data-url="<?php print render($item); ?>" >
	        <?php print render($item); ?>
        </div>
      <?php endforeach; ?>
</div>
