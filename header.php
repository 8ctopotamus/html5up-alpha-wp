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
	<header id="header" class="<?php echo is_page_template( 'page-landing.php' ) ? 'alt' : '' ?>">
		<h2>
			<a href="<?php echo site_url(); ?>"><?php bloginfo( 'name' ); ?></a>
		</h2>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'menu-1',
				'container' => 'nav',
				'container_id' => 'nav'
			) );
		?>
	</header>

	<?php 
		if ( is_page_template( 'page-landing.php' ) ): 
			$cta_1_text = esc_attr( get_post_meta( get_the_ID(), 'h5ua_cta_1_text', true) );
			$cta_1_link = esc_attr( get_post_meta( get_the_ID(), 'h5ua_cta_1_link', true) );
			$cta_2_text = esc_attr( get_post_meta( get_the_ID(), 'h5ua_cta_2_text', true) );
			$cta_2_link = esc_attr( get_post_meta( get_the_ID(), 'h5ua_cta_2_link', true) );
		?>
		<!-- Banner -->
		<section id="banner">
			<?php the_custom_logo(); ?>
			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php 
				$subtitle = esc_attr( get_post_meta( get_the_ID(), 'h5ua_subtitle', true) );
				if ($subtitle) {
					echo '<p>' . $subtitle . '</p>';
				}
			?>
			<ul class="actions special">
				<?php if ( $cta_1_text || $cta_1_link ): ?>
					<li><a href="<?php echo $cta_1_link; ?>" class="button primary"><?php echo $cta_1_text; ?></a></li>
				<?php endif; ?>
				<?php if ( $cta_2_text || $cta_2_link ): ?>
					<li><a href="<?php echo $cta_2_link; ?>" class="button"><?php echo $cta_2_text; ?></a></li>
				<?php endif; ?>
			</ul>
		</section>
	<?php endif; ?>

	<section id="main-wrap" class="container">