<?php
    dpm($fields);
/*
    dpm($variables);
    dpm($row);
    dpm($fields['field_product_question_2']);
    */
	//dpm(get_defined_vars());
?>


<div class="faq-left">
<?php
	print $fields['title']->content;
?>
<div class="deco" style="background-image:url(<?php print $fields['field_decoration_image']->content ?>);">&nbsp;</div>
</div>

<div class="faq-right">
<?php

	// 
	if (!empty($fields['field_product_question_2']->content) ) {
		if (!empty($fields['field_section1_title']->content) ) {
			print '<h2>'. $fields['field_section1_title']->content .'</h2>';
		}
		print $fields['field_product_question_2']->content;
	}
	
	if (!empty($fields['field_company_question']->content) ) {
		if (!empty($fields['field_section2_title']->content) ) {
			print '<h2>'. $fields['field_section2_title']->content .'</h2>';
		}
		print $fields['field_company_question']->content;
	}
	
	if (!empty($fields['field_safety_question']->content) ) {
		if (!empty($fields['field_section3_title']->content) ) {
			print '<h2 class="h_section_safety h_section3">'. $fields['field_section3_title']->content .'</h2>';
		}
		print $fields['field_safety_question']->content;
	}
	
	if (!empty($fields['field_section4_questions_1']->content) ) {
		if (!empty($fields['field_section4_title']->content) ) {
			print '<h2 class="h_section_question h_section4">'. $fields['field_section4_title']->content .'</h2>';
		}
		print $fields['field_section4_questions_1']->content;
	}	

	if (!empty($fields['field_section5_questions_1']->content) ) {
		if (!empty($fields['field_section5_title']->content) ) {
			print '<h2 class="h_section5">'. $fields['field_section5_title']->content .'</h2>';
		}
		print $fields['field_section5_questions_1']->content;
	}		



	if (!empty($fields['field_image1']->content) ) {
		print('<div class="faq-divider faq-divider-1" style="background-image:url(' . $fields["field_image1"]->content . ');"></div>');
	}
	if (!empty($fields['field_product_question_1']->content) ) {
		if (!empty($fields['field_section1_title']->content) ) {
			print '<h2>'. $fields['field_section1_title']->content .'</h2>';
		}
		print $fields['field_product_question_1']->content;
	}
	
	
	
	if (!empty($fields['field_image3']->content) ) {
		print('<div class="faq-divider faq-divider-3" style="background-image:url(' . $fields['field_image3']->content . ');"></div>');
	}
	if (!empty($fields['field_company_question']->content) ) {
		if (!empty($fields['field_section2_title']->content) ) {
			print '<h2>'. $fields['field_section2_title']->content .'</h2>';
		}
		print $fields['field_company_question_1']->content;
	}
	
	
	if (!empty($fields['field_image2']->content) ) {
		print('<div class="faq-divider faq-divider-2" style="background-image:url(' . $fields["field_image2"]->content . ');"></div>');
	}	
	if (!empty($fields['field_safety_question_1']->content) ) {
		if (!empty($fields['field_section3_title']->content) ) {
			print '<h2>'. $fields['field_section3_title']->content .'</h2>';
		}
		print $fields['field_safety_question_1']->content;
	}
	
	
	if (!empty($fields['field_image4']->content) ) {
		print('<div class="faq-divider faq-divider-4" style="background-image:url(' . $fields["field_image4"]->content . ');"></div>');
	}
	if (!empty($fields['field_section4_questions']->content) ) {
		if (!empty($fields['field_section4_title']->content) ) {
			print '<h2>'. $fields['field_section4_title']->content .'</h2>';
		}
		print $fields['field_section4_questions']->content;
	}
	
	
	if (!empty($fields['field_image5']->content) ) {
		print('<div class="faq-divider faq-divider-5" style="background-image:url(' . $fields["field_image5"]->content . ');"></div>');
	}	
	if (!empty($fields['field_section5_questions']->content) ) {
		if (!empty($fields['field_section5_title']->content) ) {
			print '<h2>'. $fields['field_section5_title']->content .'</h2>';
		}
		print $fields['field_section5_questions']->content;
	}

	
	
	
/*
	if (!empty($fields['field_company_question_1']->content) ) {
		print '<h2>Company</h2>';
		print $fields['field_company_question_1']->content;
	}

	if (!empty($fields['field_safety_question_1']->content) ) {
		print '<h2>Safety</h2>';
		print $fields['field_safety_question_1']->content;
	}
?>

<?php
	if (!empty($fields['field_image1']->content)){
		print('<div class="faq-divider-1" style="background-image:url(' . $fields["field_image1"]->content . ');"></div>');
	}
?>
<?php
	if (!empty($fields['field_product_question']->content) ) {
		print '<h2 class="first-header">Products</h2>';
		print $fields['field_product_question']->content;
	}
?>

<?php
	if (!empty($fields['field_image3']->content)){
		print('<div class="faq-divider-2" style="background-image:url(' . $fields["field_image3"]->content . ');"></div>');
	}
?>
<?php
	if (!empty($fields['field_company_question']->content) ) {
		print '<h2 class="first-header">Company</h2>';
		print $fields['field_company_question']->content;
	}

	if (!empty($fields['field_safety_question']->content) ) {
		print '<h2>Safety</h2>';
		print $fields['field_safety_question']->content;
	}
	*/
?>
</div>