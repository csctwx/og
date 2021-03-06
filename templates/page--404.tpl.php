<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<div id="page-wrapper"><div id="page">

  <div id="header"><div class="section clearfix">
	<div class="full-col-top clearfix">
			<div class="full-section">
				<div class='tagline'>
					<img class="tagline" src="/sites/all/themes/og/images/nav_tag.png" alt="logo" />
				</div>
				<div class="logo">
					<a href="/"><img class="logo" src="/sites/all/themes/og/images/nav_logo.png" /></a>
				</div>
			</div>
			
		<?php print render($page['header']); ?>

	</div> <!-- END .full-col -->
  </div></div><!-- /.section, /#header -->

<div id="main-wrapper" class="clearfix">
  <div id="main" class="clearfix <?php if ($main_menu || $page['navigation']) { print ' with-navigation'; } ?>">
	
	<?php  if ($page['navigation'] || $main_menu):  ?>
		<div id="nav-wrapper" class="nav-wrapper">
			<div id="navigation" class="nav-top clearfix">
				<div class="section clearfix pad">
				<a href="/"><img class="badge" src="/sites/all/themes/og/images/nav_badge.png" /></a>
				<?php print theme('links__system_main_menu', array(
				  'links' => $main_menu,
				  'attributes' => array(
					'id' => 'main-menu',
					'class' => array('links', 'inline', 'clearfix'),
				  ),
				  'heading' => array(
					'text' => t('Main menu'),
					'level' => 'h2',
					'class' => array('element-invisible'),
				  ),
				)); ?>
	
				<?php print render($page['navigation']); ?>
	
				</div>
			</div><!-- /.section, /#navigation -->
		</div><!-- /.nav-wrapper -->
    <?php endif; ?>
    
    <div id="top-ribbon"></div>
    <div id="content-wrapper" class="content-wrapper clearfix">
    <img id="bg-image" src="/sites/all/themes/og/images/bg-gradient.jpg" />
    
    <div class="content-inner clearfix">
    
		<div id="content" class="column">
			<div class="section">
			  
			  
				<!--<h1 class="title" id="page-title"><?php print $title; ?></h1>-->
			 
			  <div class="error-404">
				<img src="/sites/all/themes/og/images/404-jeepers.png" />
			  	<a href="/"><span>Home</span></a>
			  	<img class="bird" src="/sites/all/themes/og/images/404-bird_decoration.png" />
			  </div>
			</div>
		</div><!-- /.section, /#content -->
	
		<?php print render($page['sidebar_first']); ?>
	
		<?php print render($page['sidebar_second']); ?>
		
	</div><!-- /#content-inner -->	

	</div><!-- /#content_wrapper -->
	
  </div></div><!-- /#main, /#main-wrapper -->

  <?php print render($page['footer']); ?>

</div></div><!-- /#page, /#page-wrapper -->

<div id="login-wrapper">
	<?php print render($page['bottom']); ?>
	<a href="?#overlay=admin/hearts-queue">Hearts Queue</a>
</div>

