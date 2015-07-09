<?php //TODO: MOVE STYLES, JS TO SEPARATE STYLESHEETS DURING OPTIMIZATION;?>


<style>
	.bookshelfContainer{

		position: relative;
		margin-left: auto;
		margin-right: auto;
		width: 1130px;
		height:910px;
			left:-155px;
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
		left: 736px;
		/*left: 736px;
		width: 319px;*/
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
	/*josh added here.  the other way to do this to customize page.tpl.php to remove title*/
	#page-title {
		display:none;
	}
</style>



<script>
var bookList =  {
        
<?php 

$view = views_get_view_result('bookshelf','bookshelf_block');

$i = 1;
$length = count($view);
foreach ($view as $book) {
	$title_link = str_replace(' ','-',$book->node_title);
	$doll_link = drupal_get_path_alias('node/'.$book->node_field_data_field_book_doll_nid);
	
	print '"'.$title_link.'": [';
	print "\n{\n";
	print '"title":"'.$book->node_title.'",';
	print '"image":"'.$book->field_field_image[0]['raw']['filename'].'",';
	print '"id":"'.$book->nid.'",';
	print '"doll_name":"'.$book->node_field_data_field_book_doll_title.'",';
	print '"doll_link":"'.$doll_link.'",';
	print '"issuu":"'.$book->field_field_issuu_link[0]['raw']['value'].'",';
	print '"pdf":"'.$book->field_field_chapter_download[0]['raw']['filename'].'"';
			
	print "\n}\n";
	print "\n]";
	if ($i<$length) {
	print ",\n";
	}
	$i++;
	}


?>

	
}
</script>


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

