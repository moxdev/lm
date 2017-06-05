<?php
/**
 * Template Name: About Page
 *
 * This is the template that displays the about page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leading_Minds
 */

get_header();

    if ( function_exists( 'leading_minds_custom_header' ) ) {
        leading_minds_custom_header();
    } ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if ( function_exists( 'get_field' ) ) {

                $h1 = get_field( 'title_h1' ); ?>

                    <h1 class="section-title"><?php echo esc_html( $h1 ); ?></h1>

                <?php

            } ?>

            <?php if ( function_exists( 'leading_minds_flexible_content_module' ) ) {
                leading_minds_flexible_content_module();
            } ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
