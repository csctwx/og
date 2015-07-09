<?php
/**
 * @file
 * Zen theme's implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   - view-mode-[mode]: The view mode, e.g. 'full', 'teaser'...
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 *   The following applies only to viewers who are registered users:
 *   - node-by-viewer: Node is authored by the user currently viewing the page.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content. Currently broken; see http://drupal.org/node/823380
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see zen_preprocess_node()
 * @see template_process()
 */
?>
<?php drupal_add_css(drupal_get_path('theme', 'og') . '/css/yam.css', array('group' => CSS_THEME, 'type' => 'file')); ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>



  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
	  hide($content['field_y_product_id']); 
	  hide($content['field_y_prim_image']);
	  hide($content['field_y_description']);
	  hide($content['field_y_subtitle']);
	  hide($content['field_y_whaticomewith']);
	  hide($content['field_y_sec_descp']);	  
	  hide($content['field_y_rolloverimage']);
	  hide($content['field_y_gridimage']);
	  hide($content['field_y_buylinks']);
	  hide($content['field_y_related_prod']);
	  hide($content['field_y_comeswith_thumb']);
	  hide($content['field_y_comeswith_popover']);
	  hide($content['field_y_deco_image']);
	  hide($content['field_y_related_prod_thumb']);
	  
	   ?>   

  </div>
  
  
  <div class='yam-center-content'>
		<div class='yam-deco-image'>
		<?php print render ($content['field_y_deco_image']); ?>
		</div>
		
		<div class='yam-primary-image'>
		<?php print render ($content['field_y_prim_image']); ?>
		</div>
		
		<div class='yam-sec-desc'>
		<?php print render ($content['field_y_sec_descp']); ?>
		</div>
		
		<div class='yam-subtitle'>
		<?php print render ($content['field_y_subtitle']); ?>
		</div>
		
		<div class='yam-description'> 
		<?php print render ($content['field_y_description']); ?>
		</div>
		
		<div class='yam-related'> 
		<?php print "<h3>Check these out:</h3>"; ?>
		</div>
		 <div class = 'yam-rating'>
	    <?php print render($content); ?>
	    </div>
		

	<img class="rating-yam-label" src="/sites/all/themes/og/images/acc-rate-label.png">
	<img class="default-yam-insignia" src="/sites/all/themes/og/images/rate-default-insignia.png">

	<div class="yam-wheretobuy">
			<a href="/pages/where"><img class="yam-wheretobuy " src="/sites/all/themes/og/images/doll-where.png"/></a>
		</div>
		
		


	<?php print "<h2 class='yam-here-all-stuff'>Here's all the great stuff I come with:</h2>"; ?>
	<?php print '<div class="top-orange-ribbon">&nbsp;</div>'; ?>
	<?php /*print '<div class="left-arrow arrow-link"><a href="'.$prev_url.'"></a></div>';*/?>
	<?php /* print '<div class="right-arrow arrow-link"><a href="'.$next_url.'"></a></div>';*/?>


	
		<img class="buy-yam-where" src="/sites/all/themes/og/images/doll_buy_off.png">
		
		<p><div class='yam-where-buy'>
		<a href="<?php print render ($content['field_y_buylinks']); ?> </a>
		</div></p>
		
		<div class='yam-comeswith'>
		<a rel="shadowbox" href= "<?php print render ($content['field_y_comeswith_popover']); ?>" </a>  
		</div>
		
		<div class='yam-comeswithbanner'>
		<img src="/sites/all/themes/og/images/whaticomewith.png">
		</div>

		
<!-- /.node -->
