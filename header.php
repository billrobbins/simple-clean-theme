<?php
/**
 * The file for displaying the header.
 *
 * This file also loads wp_head, the header
 * section and loads the content #wrap
 *
 * @package WordPress
 * @subpackage Simple
 * @since 1.0.0
 *
 *
 */?><!DOCTYPE html>
 <!--[if IE 8 ]> <html class="ie8"> <![endif]-->
 <!--[if IE 9 ]> <html class="ie9"> <![endif]-->
 <!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
 <head>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<?php if ( of_get_option('favicon', $single = true) != "" ) : ?>
	<link rel="shortcut icon" href="<?php echo of_get_option('favicon'); ?>" type="image/x-icon" />
	<?php endif; ?>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!--Load WP Head-->
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<div id="header" class="clearfix">
		
		<div id="header-content" class="clearfix">
		
			<?php wp_nav_menu( array( 
				'theme_location'	=> 'primary',
				'container'			=> 'nav',
				'container_id'		=> 'main-menu',
				'menu_id'			=> 'top-menu',
				'menu_class'		=> 'clearfix',
				'depth'				=> 2,
				'fallback_cb'		=> false
				) ); ?>
		
		</div><!--#header-content -->
		
	</div><!-- #header -->
	
	<?php if(of_get_option('header_blog_title') == 'image') { ?>
	
		<div id="logo">
		<?php if (is_front_page()) {
				echo '<h1><a href="'.home_url().'/"><img src="'.of_get_option('logo','').'" alt="'.get_bloginfo('name').'" /></a></h1>';
			} else {
				echo '<p><a href="'.home_url().'/"><img src="'.of_get_option('logo','').'" alt="'.get_bloginfo('name').'" /></a></p>';
			} ?>
		</div>
		
	<?php } elseif(of_get_option('header_blog_title') == 'text') { ?>
	
		<div id="text-logo">
		<?php if (is_front_page()) {
				echo '<h1><a href="'.home_url().'/">'.get_bloginfo('name').'</a></h1>';
			} else {
				echo '<p><a href="'.home_url().'/">'.get_bloginfo('name').'</a></p>';
			} ?>
		</div>
		
	<?php } ?>
	
	<div id="wrap" class="clearfix">