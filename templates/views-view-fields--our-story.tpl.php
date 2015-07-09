<?php
    //dpm($fields);
    //dpm($variables);
    //dpm($row);
	//dpm(get_defined_vars());
?>

<div class="page-heading">
<?php
	if (!empty($fields['field_header_image']->content) ) {
		print $fields['field_header_image']->content;
	} else {
		print '<h1>Else ' . $fields['title']->content . '</h1>';
	}

/*
	if (!empty($fields['field_story_section']->content) ) {
		print $fields['field_story_section']->content;
	}
	
*/	
//////////////
	if (!empty($fields['field_section1_wrap']->content) ) {
		print "<div class='story-subhead curly'><a href='#section1' name='section1'>";
		print $fields['field_section1_wrap']->content;
		print "</a></div>";
	}
	
	if (!empty($fields['field_section1_body']->content) ) {
		print '<div class="story-text">';
		print $fields['field_section1_body']->content;	
		print '</div>';
	}
	
	if (!empty($fields['field_image1']->content) ) {
		print '<div class="story-divider" style="background-image:url(' . $fields['field_image1']->content . ');"></div>';
	}
	
//////////////
	if (!empty($fields['field_section2_title']->content) ) {
		print "<div class='story-subhead curly'><a href='#section2' name='section2'>";
		print $fields['field_section2_title']->content;
		print "</a></div>";
	}
	
	if (!empty($fields['field_section2_body']->content) ) {
		print '<div class="story-text">';
		print $fields['field_section2_body']->content;	
		print '</div>';
	}
	
	if (!empty($fields['field_image2']->content) ) {
		print '<div class="story-divider" style="background-image:url(' . $fields['field_image2']->content . ');"></div>';
	}
	
//////////////
	if (!empty($fields['field_section3_title']->content) ) {
		print "<div class='story-subhead curly'><a href='#section3' name='section3'>";
		print $fields['field_section3_title']->content;
		print "</a></div>";
	}
	
	if (!empty($fields['field_section3_body']->content) ) {
		print '<div class="story-text">';
		print $fields['field_section3_body']->content;	
		print '</div>';
	}
	
	if (!empty($fields['field_image3']->content) ) {
		print '<div class="story-divider" style="background-image:url(' . $fields['field_image3']->content . ');"></div>';
	}
	
	
//////////////
	if (!empty($fields['field_section4_title']->content) ) {
		print "<div class='story-subhead curly'><a href='#section4' name='section4'>";
		print $fields['field_section4_title']->content;
		print "</a></div>";
	}
	
	if (!empty($fields['field_section4_body']->content) ) {
		print '<div class="story-text">';
		print $fields['field_section4_body']->content;	
		print '</div>';
	}
	
	if (!empty($fields['field_image4_1']->content) ) {
		print '<div class="story-divider" style="background-image:url(' . $fields['field_image4_1']->content . ');"></div>';
	}
	
	
	
?>

</div>