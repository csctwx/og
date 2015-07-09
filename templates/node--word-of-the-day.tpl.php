<div class="wod-bg1 bg"></div>
<h1 class="wod-page-title">Word of the Day</h1>

	<div class="wod-intro intro-text">
	<?php
		$block = module_invoke('block', 'block_view', '7');
		print $block['content'];
	?>
	</div>

<div class="wod-main png">
<?php 
print "<h1 class='wod-title'>" . $content['field_wod_question'][0]['#markup'] . "</h1>";
?>
<div class="wod-state png"></div>

<?php
$correct = $content['field_wod_correct_answer']['#items'][0]['value'];

//dpm($content);
//dpm($content['field_wod_correct_answer']['#items'][0]['value']);

//dpm("test2");
//dpm($content['field_wod_answer'][0]['#markup']);
//print render($content); 
?>

<div class="wod-answer wod-odd wod-ans-1 <?php if ($correct == 1){ print 'correct'; }?>">
	<!--
	<a class="wodSelectButton"></a>
	<div class="badge badge1"></div>
	-->
	<?php print render($content['field_wod_answer'][0]['#markup']); ?>
</div>
<div class="wod-answer wod-odd wod-ans-2 <?php if ($correct == 2){ print 'correct'; }?>">
	<!--
	<a class="wodSelectButton"></a>
	<div class="badge badge2"></div>
	-->
	<?php print render($content['field_wod_answer'][1]['#markup']); ?>
</div>
<div class="wod-answer wod-odd wod-ans-3 <?php if ($correct == 3){ print 'correct'; }?>">
	<!--
	<a class="wodSelectButton"></a>
	<div class="badge badge3"></div>
	-->
	<?php print render($content['field_wod_answer'][2]['#markup']); ?>
</div>
<div class="wod-answer wod-odd wod-ans-4 <?php if ($correct == 4){ print 'correct'; }?>">
	<!--
	<a class="wodSelectButton"></a>
	<div class="badge badge4"></div>
	-->
	<?php print render($content['field_wod_answer'][3]['#markup']); ?>
</div>

<?php
$older = node_sibling('previous', $node,'',NULL,NULL); 
$newer = node_sibling('next',$node,'',NULL,NULL); 


$clean_node_created = strtotime(date('Y-m-d', $node->created));
$clean_today = strtotime(date('Y-m-d'));

//dpm('created on '.$clean_node_created);
//dpm('today is '.$clean_today);

print '<div class="older_post">'.$older.'</div>';
	
if ($clean_node_created < $clean_today) {  
	print '<div class="newer_post">'.$newer.'</div>'; 
}
?>

<div class="wod-success">
	<div class="wod-answer wod-success-content"></div>
	<div class="wod-extra">
		<?php print render($content['field_extra_text'][0]['#markup']); ?>
	</div>
</div>

</div>



<script>
(function ($) {
	$(".wod-answer").click(function() {
		if ($(this).hasClass('correct')){
			//alert($(this).);
			$(".wod-success-content").html($(this).html() );
			$(".wod-success").fadeIn();
			$(".wod-success-content").fadeIn("slow");
			$("div.wod-state").removeClass("wrong");
			$("div.wod-state").addClass("correct");
		} else if ($(this).hasClass('wod-success-content')) {
			// Advance to next question
			var nextLink = $(".newer_post a").attr('href');
			if (!nextLink){
				nextLink = "override";
			}
			//alert("going to " + nextLink);
			window.location = nextLink;
			
		} else {
			//alert("duck");
			$(this).addClass('fail');
			$("div.wod-state").addClass("wrong");
		}
		
	});

})(jQuery);
</script>