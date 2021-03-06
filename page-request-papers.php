<?php
/**
 * Template Name: Request Papers Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Leading_Minds
 */

get_header();

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if ( function_exists( 'leading_minds_flexible_content_module' ) ) {
                leading_minds_flexible_content_module();
            }  ?>

            <div class="section-form">
                <div class="background-wrapper">
                    <div class="form-wrapper">

                        <?php if(function_exists( 'mm4_you_contact_form' )): mm4_you_contact_form(); endif; ?>

                    </div>
                </div>
            </div>

            <section class="testimonial-section">
                <div class="content-section-wrapper">
                    <div class="microphone-section">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="47" viewBox="0 0 26 47"><title>microphone</title><image width="26" height="47" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAvCAYAAAD9/drQAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAAqFJREFUWIXtlz9IlHEYx7/v2aDnFEX+CSxFxEHJTXSRojrBIUMQnBoCl6IxilocXGpxaChbEsJVWlpaXJoMpEHEwDDxAsWGBs8Q7dPg9+jHed7de4cIcg/8hnue7/f5/N7fvffe+0hFAkgAw8B7YB3Y81p3bhhIFOtTDNIDLPI/loGPXstBfhHoKReSAjLAAfAWaMujaXPtwNpUXEi3jb+BwRL0g9ZmgO5SIRGwAPwFhmJsbsieBSAqxZDyuc+UCgm8M/YWP0Jg2uKuMkBd9k6XIl4C0nEhgT8NLOXm893/TZJ+lAuyt6kU0HlJexWA9tyjKOhEogqqgqqgKug0QUAv0HxSAKAZ6BWwD8wGBYD5ChrPAwSfZ4H9hKQaScmKtl04kpJqzuDNcJqgXUnF38uOj8g9joD2JdUFuQ1JDRWAGtwjG3WS9hOSvkvqDArLkjqAxrgEezrcIxudklYTkhYktQBXXJjT4eXfjwuyJ3IPAVcltUj6ImDMP9InLiaBTb+0t8a4mlZ7NoGkc0/de0xAPbANbAC1FoxasAQceRnMA2myFmDUuVr33Abqs8LnFk0E5knn0sBIvgnBk8eINQCTQW3CuWehoQ5Y8XPvepB/CPyx4RswBTzymnIOax4EvhvutZI9pRDWA+z4nPuDfBvw2mefG5uutQX6fvfY4bhxk8PJLQPsAuPhcXE4NHcCN706CYZkH+O4vRmKTYpAH/DTO/4M3KbA1O0NpKzF3r5cXd5HDXBB0gtJ93T4N5KW9EnSV0lbll2SdE3SLUmXJR1ImpH0OIqiXwWvJg+wHXgJrOb5frKxak17rOYFoI3AALDlNUAZj6k4wDVgLa7v7P3xnStUBO5KupOTvujau5z8hyiK5sraBfCmwN2WG68K9foHxhhKjiKV7REAAAAASUVORK5CYII="/></svg>
                        <h5>testimonials</h5>
                    </div>

                    <?php
                        // WP_Query arguments
                        $args = array(
                            'post_type'   => array( 'testimonials' ),
                            'post_status' => array( 'publish' ),
                            'nopaging'    => true,
                            'order'       => 'DESC',
                            'orderby'     => 'date',
                        );
                        // The Query
                        $testimonials = new WP_Query( $args );
                        // The Loop
                        if ( $testimonials->have_posts() ) {
                            ?>

                            <div class="testimonial-carousel">

                            <?php while ( $testimonials->have_posts() ) {
                                $testimonials->the_post();
                                $job_title = get_field( 'job_title', $post->ID );
                                ?>

                                <div class="cell">

                                    <?php
                                    the_content('<p>' , '</p>');
                                    the_title('<h4>' , '</h4>');
                                    echo '<h5>' . $job_title . '</h5>';
                                    ?>

                                </div><!-- cell -->

                                <?php
                            } ?>

                            </div><!-- testimonial-carousel -->

                            <?php

                        // Restore original Post Data
                        wp_reset_postdata();
                    } ?>

                </div>

            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
