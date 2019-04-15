<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package html5up-alpha
 */

	$boxTitle = esc_attr( get_post_meta( get_the_ID(), 'h5ua_main_box_title', true) );
	$boxContent = esc_attr( get_post_meta( get_the_ID(), 'h5ua_main_box_content', true) );
	$boxImageUrl = esc_attr( get_post_meta( get_the_ID(), 'h5ua_main_box_image_url', true) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="box">
			<header class="major">
				<h2><?php echo $boxTitle; ?></h2>
				<p><?php echo $boxContent; ?></p>
			</header>
			<?php if ( $boxImageUrl ): ?>
				<span class="image featured">
					<img src="<?php echo $boxImageUrl; ?>" alt="<?php echo $boxTitle; ?>">
				</span>
			<?php endif; ?>
		</div>

		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'html5up-alpha' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'html5up-alpha' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
