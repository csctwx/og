<?php

/**
 * @file
 * Default theme implementation to display the bar for a single choice in a
 * poll.
 *
 * Variables available:
 * - $title: The title of the poll.
 * - $votes: The number of votes for this choice
 * - $total_votes: The number of votes for this choice
 * - $percentage: The percentage of votes for this choice.
 * - $vote: The choice number of the current user's vote.
 * - $voted: Set to TRUE if the user voted for this choice.
 *
 * @see template_preprocess_poll_bar()
 */

?>

<?php
	$remain = 100 - $percentage;
	$min = 100;
	if ($remain > $min){
		$remain = $min;
	}
?>
<div class="text"><?php print $title; ?></div>
<div class="bar <?php print strtolower($title); ?>">
  <div style="right: <?php print $remain; ?>%;" class="foreground"></div>
</div>
<div class="percent">
  <?php print $percentage; ?>% (<?php print format_plural($votes, '1 vote', '@count votes'); ?>)
</div>
