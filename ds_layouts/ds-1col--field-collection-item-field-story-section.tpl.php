<?php
    //dpm("-=-=-=-=-=-=-=-=-=-=-");
    //dpm($variables);
    //dpm($fields);
	//dpm(get_defined_vars());
	//dpm($variables['field_front_spangle']);
?>

<?php

if (!empty($variables['field_section_title'][0]['value'])){
	print "<h2 class='story-subhead'>";
	print $variables['field_section_title'][0]['value'];
	print "</h2>";
}

if (!empty($variables['field_section_text'][0]['value'])){
	print "<div class='story-text'>";
	print $variables['field_section_text'][0]['value'];
	print "</div>";
}


if (!empty($variables['field_front_spangle'][0]['filename'])){
	print "<div class='story-divider' style='background-image:url(/sites/public/" . $variables['field_front_spangle'][0]['filename'] . ")'></div>";
}

?>