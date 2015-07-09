<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
   // dpm($fields);
    //dpm($variables);
    //dpm($row);
	//dpm(get_defined_vars());
?>






<style>
	.bookshelfContainer{

		position: relative;
		margin-left: auto;
		margin-right: auto;
		width: 1130px;
		height:910px;

	}

	.bookButton{
		position: absolute;
	}

	.bookContent{
		position: absolute;
		left:740px;
		top:320px;
	}

	.treeGraphic{
		position: absolute;
		left:0px;
		top:0px;
	}
	.cloudGraphic{
		position: absolute;
		left:137px;
		top:27px;
	}

	.rolloverMap{
		position:absolute;
	}
	.rolloverImages{
		position:absolute;
	}

	.rolloverIMG {
		position:absolute;
	}


	.rolloverIMG:hover{
		cursor: pointer;
	}

	.header{
		position: absolute;
		left:796px;
		top:54px;
		color:#593b8c;
		width:340px;
		margin:0px;
	}
	/*
	.title{
		font-size: 55px;
		margin:0px;
	}
	*/
	.description{
		margin:0px;
		font-family: Arial;
		font-size: 13px;
		/*font-weight: 900;*/
		
	}
</style>

<script type="text/javascript" src="/ajax/bookshelf/js/raphael-min.js"></script>
<script type="text/javascript" src="/ajax/bookshelf/js/bookshelf.js"></script>
       
<div class="bookshelfContainer" id="bookshelfContainer">
	<img class="cloudGraphic" src="/ajax/bookshelf/assets/cloud.png">
	<img class="treeGraphic" src="/ajax/bookshelf/assets/tree.png">
	
	<div class='header'>
		<h1 class='title curly'>Bookshelf</h1>
		<p class='description'>Our Generation's story is made up of a bajillion individual ones. They're written in our diaries, on our faces, in our dreams and sometimes in a book. Poke around the bookshelf and discover some stories that just might be a lot like your own.</p>
	</div>
	
	<div class="rolloverImages" id="rolloverImages">
	</div>	
	
	
	
	<div class="rolloverImages" id="rolloverTitles">
	</div>	
	
	<div class="rolloverMap" id="rolloverMap">
	</div>
	
	<div class="bookContent" id="bookContent">
		<img src="/ajax/bookshelf/assets/book-clouds.png">
		
	</div>
</div>
 









<?php
/*
// TODO: Put Date Here!

$divOpen = "<div class='book-feature";
if (!empty($fields['field_extra_classes']->content) ) :
	$divOpen .= $fields['field_extra_classes']->content;
endif;
$divOpen .= "'>";
	
print $divOpen;


	print "<div class='content'>";

	if (!empty($fields['title_1']->content) ) :
	  print $fields['title_1']->content;
	endif;
	
	if (!empty($fields['field_image']->content) ) :
		print $fields['field_image']->content;
	endif;


	
	print "</div>";

print "</div>";
*/
?>
