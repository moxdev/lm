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

            <div class="flex-wrapper">

                <div class="contact-wrapper">

                    <?php if ( function_exists( 'get_field' ) ) {

                        $phone = get_field( 'phone', 'option' );
                        $email = get_field( 'email', 'option' );
                        $hours = get_field( 'hours', 'option' );

                        ?>

                        <?php echo file_get_contents("wp-content/themes/leading_minds/imgs/footer-logo.svg"); ?>

                        <div class="link-wrapper">
                            <a class="contact-link" href="tel:<?php echo esc_html( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
                            <a class="contact-link" href="mailto:<?php echo esc_html( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                            <span><?php echo esc_html( $hours ); ?></span>
                        </div>

                        <?php
                    } ?>

                </div><!-- contact-wrapper -->
                <div class="social-wrapper">

                    <a class="twitter" href="#"><?php echo file_get_contents('wp-content/themes/leading_minds/imgs/twitter-logo.svg'); ?></a>

                    <a class="linkedin" href="#"><?php echo file_get_contents('wp-content/themes/leading_minds/imgs/linkedin-logo.svg'); ?></a>

                    <a class="bbb" href="#"><?php echo file_get_contents('wp-content/themes/leading_minds/imgs/bbb-logo.svg'); ?></a>

                    <a class="pcc" href="#"><?php echo file_get_contents('wp-content/themes/leading_minds/imgs/pcc-logo.svg'); ?></a>

                </div>

            </div>

            <div class="privacy-wrapper">

                <a href="<?php echo esc_url( get_page_link( get_page_by_title( 'Terms and Conditions' ) ) ); ?>">Terms and Conditions</a>

                <a href="<?php echo esc_url( get_page_link( get_page_by_title( 'Privacy Policy' ) ) ); ?>">Privacy Policy</a>

            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
