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

	<?php if (is_page_template('page-landing.php')): ?>
		<section id="cta">
			<h2>Sign up for beta access</h2>
			<p>Blandit varius ut praesent nascetur eu penatibus nisi risus faucibus nunc.</p>
			<form>
				<div class="row gtr-50 gtr-uniform">
					<div class="col-8 col-12-mobilep">
						<input type="email" name="email" id="email" placeholder="Email Address">
					</div>
					<div class="col-4 col-12-mobilep">
						<input type="submit" value="Sign Up" class="fit">
					</div>
				</div>
			</form>
		</section>
	<?php endif; ?>

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
