
<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 	//dpm($variables);
 	//dpm($page);
 	//dpm($view);
 	//dpm($view->field['field_header_image']->original_value);
 	//dpm($view->field['field_source_type']->original_value);
 	//dpm($page['field_header_image']);
 	
 	$curFilter = $view->field['field_source_type']->original_value;
?>

<div class="list-heading">
<?php
	if (!empty($view->field['field_header_image']->original_value) ) {
		print $view->field['field_header_image']->original_value;
	} else {
		print '<h1>' . $view->field['title_1']->original_value . '</h1>';
	}
?>

<ul class="press-subnav curly clearfix">
	<li><a href="/press">All</a></li>

<?php 
$terms=taxonomy_get_tree('7');

foreach ($terms as $term) {
	//$slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $term));
	$slug = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', $term->name));

	if (strlen($curFilter) > 2 && $term->name == $curFilter){
		print "<li><a class='active' href='/press/$slug'>$term->name</a></li>";
	} else {
		print "<li><a href='/press/$slug'>$term->name</a></li>";
	}
	
}
?>
</ul>


</div>
<?php foreach ($rows as $id => $row): ?>
    <?php print $row; ?>
<?php endforeach; ?>
