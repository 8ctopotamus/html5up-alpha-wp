<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package html5up-alpha
 */

?>

	</section><!-- #main -->

	<!-- Footer -->
	<footer id="footer">

		<ul class="icons">
			<?php wp_nav_menu(
				array(
					'items_wrap' => '%3$s',
					'walker' => new WO_Nav_Social_Walker(),
					'container' => false,
					'menu_class' => 'icons',
					'theme_location' => 'social',
					'fallback_cb' => false
					)
				); 
			?>
		</ul>
		<ul class="copyright">
			<li>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'html5up-alpha' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Proudly powered by %s', 'html5up-alpha' ), 'WordPress' );
					?>
				</a>
				<span class="sep"> | </span>
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'html5up-alpha' ), 'html5up-alpha', '<a href="https://icshelpsyou.com">ICS, LLC</a>' );
				?>
			</li>
		</ul>
	</footer>

</div><!-- #page-wrapper -->

<?php wp_footer(); ?>

</body>
</html>
