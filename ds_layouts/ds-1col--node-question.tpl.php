<?php
/*
    dpm($variables);
    dpm($variables['nid']);
    dpm($variables['field_question'][0]['value']);
	dpm($variables['body'][0]['value']);
*/
?>


<div class="faq-answer">
	<h3><a name="question-<?php print $variables['nid']; ?>" id="question-<?php print $variables['nid']; ?>" >
	<?php
		print($variables['field_question'][0]['value']);
	?>
	</a></h3>
	
	<div class="faq-answer-content">
	<?php
		print($variables['body'][0]['value']);
	?>
	</div>
</div>
