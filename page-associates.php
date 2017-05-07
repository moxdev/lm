<?php
/**
 * Template Name: Associates Page
 *
 * This is the template that displays the default custom page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leading_Minds
 */

get_header();

    ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <header class="associates-entry-header">
                    <?php if ( get_field( 'on_page_title' )){
                            echo '<h1 class="associates-entry-title">' . get_field( 'on_page_title' ) . '</h1>';
                        } else {
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        } ?>
            </header><!-- .entry-header -->

                <?php if ( function_exists( 'leading_minds_flexible_content_module' ) ) {
                    leading_minds_flexible_content_module();
                } ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
