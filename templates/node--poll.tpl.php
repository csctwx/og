<?php
//kpr(get_defined_vars());
//http://drupalcontrib.org/api/drupal/drupal--modules--node--node.tpl.php

//dpm($variables);
//dpm($node);

//node--[CONTENT TYPE].tpl.php
if ($classes) {
  $classes = ' class="'. $classes . ' "';
}

if ($id_node) {
  $id_node = ' id="'. $id_node . '"'; 
}
?>

<!--node-->
<?php
	/* <div id<?php print $id_node . $classes .  $attributes; ?>> */ ?>
<div class="node node-poll clearfix" id="<?php print($node->nid) ?>">
  <?php print $mothership_poorthemers_helper; ?>
  
  <div class="poll-date curly">
  	<?php 
  		//format_date($date, $type = 'short');
  		//print $date;
  	?>
  	<?php print format_date($created, $type = 'short');?>
  </div>
  
  
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2 class="node-title"><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>


   <div class="content">
    <?php
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>

<?php if (!empty($cancel_form)){ ?> 
	<div class="poll poll-results active-poll">
<?php } else { ?>
	<div class="poll poll-results closed-poll">
<?php } ?>

<?php
	//dpm($node->choice);
	$vote_array = $node->choice;
	$no_votes = -1;
	$yes_votes = 0;
	foreach ($vote_array as $v) {
    	//This logic depends on No Votes coming first
    	if ($no_votes == -1){
    		$no_votes = $v['chvotes'];
    	} else {
    		$yes_votes = $v['chvotes'];
    	}
    	//dpm($v['chvotes']);
	}
	$total_votes = $yes_votes + $no_votes;
	$yes_percent = (($yes_votes / $total_votes) * 100);
	$no_percent = 100 - $yes_percent;
	/*
	dpm($total_votes);
	dpm($yes_votes);
	dpm($yes_percent);
	dpm($no_percent);
	*/
		
	// We are actually setting the bar from the right so we need to reverse percentages
	$yes_percent = 100 - $yes_percent;
	$no_percent = 100 - $no_percent;	
?>


  <?php //print $results; ?>
  
  <?php
	$remain = 100 - $yes_percent;
	$min = 100;
	if ($remain > $min){
		$remain = $min;
	}
?>
<div class="bar yes">
  <div style="right: <?php print $yes_percent; ?>%;" class="foreground"></div>
</div>

<div class="bar no">
  <div style="right: <?php print $no_percent; ?>%;" class="foreground"></div>
</div>

<div class="vote-cancel-form"><a href="#cancel" class="vote-cancel curly">Change your vote</a></div>
  
  
  <?php if (!empty($cancel_form)): ?>
    <?php print $cancel_form; ?>
  <?php endif; ?>
  
    <div class="bar-label"></div>
</div>


	</div>
	
	<div class="poll-bottom"><h4 class="curly">Vote to see the results!</h4></div>
	
</div>

