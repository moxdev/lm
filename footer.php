<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leading_Minds
 */

?>

        </div><!-- .site-content-wrapper -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">

            <div class="contact-wrapper">

                <?php if ( function_exists( 'get_field' ) ) {

                    $phone = get_field( 'phone', 'option' );
                    $email = get_field( 'email', 'option' );

                    ?>

                    <?php echo file_get_contents("http://localhost:8888/leading-minds/wp-content/themes/leading_minds/imgs/footer-logo.svg"); ?>
                    <p><?php echo esc_html( $phone ); ?></p>
                    <p><?php echo esc_html( $email ); ?></p>

                    <?php
                } ?>

            </div><!-- contact-wrapper -->
            <div class="social-wrapper"></div>
            <div class="privacy-wrapper"></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
