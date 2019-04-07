<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package html5up-alpha
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page-wrapper">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'html5up-alpha' ); ?></a>

	<!-- Header -->
	<header id="header" class="<?php is_front_page() ? 'alt' : '' ?>">
		<a href="<?php echo site_url(); ?>"><h1>Alpha by HTML5 UP</h1></a>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'container' => 'nav',
				'container_id' => 'nav'
			) );
		?>
		<!-- button item
			<ul>
		<li><a href="#" class="button">Sign Up</a></li>
		</ul> -->
	</header>

	
	<?php if (is_front_page()): ?>
		<!-- Banner -->
		<section id="banner">
			<?php the_custom_logo(); ?>
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<?php 
				$html5up_alpha_description = get_bloginfo( 'description', 'display' );
				if ( $html5up_alpha_description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $html5up_alpha_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
			<ul class="actions special">
				<li><a href="#" class="button primary">Sign Up</a></li>
				<li><a href="#" class="button">Learn More</a></li>
			</ul>
		</section>
	<?php endif; ?>
	

	<section id="main" class="container">
