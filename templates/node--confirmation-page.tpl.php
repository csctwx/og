<?php
	//dpm($variables['field_feature_url'][0]['value']);
	//dpm($variables['field_feature_url'][0]['und']->value);
?>

<?php
	$form_path = $variables['field_feature_url'][0]['value'] . "?nid=" . $_GET['nid'] ."&token=" . $_GET['token'];
	//echo $_GET['nid'];
	echo "<br/>";
	//echo $_GET['token'];
?>

<div class='text conf-intro conf-text'>
	<p>
		This is the final step. Pinky swear!
	</p>
	<p>
		Thank you for submitting your heart for possible use in packaging and other OG stuff. This is the part where you say, "Yup. Got it. You can use it."
	</p>
</div>

<div class="text conf-success conf-text">
	<p>
		That's it. We will try to let you know if we use your heart in packaging or any other OG stuff. Until then, keep visiting our site. 
		We'd love to hear from you in our Polls (link to polls), try to stump you with the <a href="/games/word-of-the-day">Word of the Day</a>, play with you on our Fun page (link to Fun) and add more of your hearts to the <a href="/games/wall-of-hearts/">Wall of Hearts</a>. Remember, Our Generation isn't about a doll or a horse or even a fantastic miniature shoe collection. It's about girls who are growing up today. Together. This is Our Generation. And this is our story.
	</p>
	<p class='confirmation-buttons'>
		<a href="/og-email" class="button button2 curly">Sign up for OG Mail </a>
		<a href="/games/draw-heart/" class="button button2 curly right-btn">Create another heart</a>
		<a href="/games/wall-of-hearts/" class="button button2 curly">Visit the Wall of Hearts</a>
	</p>
</div>

<div class="conf-bg1 bg"></div>
<div class="confirm-wrapper">
	<iframe class="confirm-frame" src="<?php echo $form_path ?>" ALLOWTRANSPARENCY="true" frameBorder="0"></iframe>
</div>
<div class="packageSubmitFormLegal">
	<img src="/sites/all/themes/og/images/legal-bg.png">
	<p class="packageSubmitFormLegalCopy">By submitting this consent form, you, for yourself and on behalf of your child (as 
applicable) are agreeing to grant to Our Generation, and its parent, subsidiary, 
and affiliated companies, the non-exclusive, perpetual, sub licensable, transferable, 
worldwide, royalty-free right and license to copy, convert, display, distribute, modify, 
make derivative works from, publish, and otherwise exploit, for commercial or non-
commercial purposes, any and all rights contained with the Heart, in whole or in 
part, including without limitation all intellectual property rights.<br><br>

In addition, you, for yourself and on behalf of your child (as applicable) represent 
and warrant to Our Generation that: (a) the Heart is the original artwork of you or 
your child; (b) that no part of the Heart infringes upon the exclusive rights of any 
other party; and © that neither you nor your child have done anything that would 
impair, restrict, or frustrate the grant of rights contemplated above, or Our Gener-
at ion’s use of those rights in any way.<br><br>

If you do not agree to any of the above, please hit Cancel.<br><br>

Sound good?
</p>
<div class="packageSubmitFormClose1"><a href="#"></a></div>
</div>

<style>
	.conf-success { display:none; }
	
	.packageSubmitFormLegal{
		position:absolute;
		left:81px;
		top:100px;
		
	}
	.packageSubmitFormLegalCopy{
		position:absolute;
		
		left:182px;
		top:31px;
		
		width: 524px;
		color:#893fbc;
		font-size: 14px;
		font-family: Helvetica, Arial;
	}
	.packageSubmitFormClose1 a{
		position: absolute;
		left:178px;
		top:420px;
		width:123px;
		height: 38px;
		cursor: pointer;
		background-repeat:no-repeat;
		background-image: url("/sites/all/themes/og/images/legal-close-1.png");
		background-position: 0px 0px;

	}
	.packageSubmitFormClose1 a:hover{
		background-position: 0px -51px;
	
	}

	
	
</style>

		
<script>
var init;
var jq;

function outerSuccess(){
	jq.finished();
}
function popTerms(){
	console.log("Hello popTerms()");
	jq.terms();
}

jQuery(document).ready( function($) {
	jq = $;
	$.finished = function finished(){
		$("h1.title").text("Thanks!");
		$(".conf-success").show();
		$(".conf-intro").hide();
		$(".confirm-wrapper").fadeOut();
	}

	$.terms = function terms(){
		$(".packageSubmitFormLegal").show();
	}	
	
	$(".packageSubmitFormClose1").click(function(e) {
		$(".packageSubmitFormLegal").hide();
	});

	$(".packageSubmitFormLegal").hide();
	
});

</script>