<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package silva
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'silva' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="wrap">
			<div class="site-branding">
				<a href='<?php echo get_site_url(); ?>'>
					<img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Silver Panel" />
				</a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<!--<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php // _e( 'Primary Menu', 'silva' ); ?></button> -->
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'TopMenu' ) ); ?>
				<span class="phone">604 837 0470</span>
				<span><a class="linked-in" href="https://www.linkedin.com/company/silva-panel" target="_blank"><i class="fa fa-linkedin"></i></a></span>
			</nav><!-- #site-navigation -->

			<div class="mobile_menu_button"><span><i class="fa fa-lg fa-bars"></i></span></div>
			<nav class="mobile_menu">
				<?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
			</nav>
		</div><!-- .wrapper -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
