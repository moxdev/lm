<?php
/**
 * Flexible Content
 *
 *
 * @package Leading_Minds
 */

function leading_minds_flexible_content_module() {

    if( have_rows('acf_page_content') ):

         // loop through the rows of data
        while ( have_rows('acf_page_content') ) : the_row();

            if( get_row_layout() == 'simple_content_section' ):

                $bg_color = get_sub_field('section_background_color');
                $editor = get_sub_field('editor');

                ?>
                <section class="simple-content-section" style="background-color:<?php echo $bg_color; ?>">
                	<div class="content-section-wrapper wrapper">

                		<?php echo $editor; ?>

                	</div>
                </section>
                <?php

            elseif( get_row_layout() == 'advanced_content_section' ):

                $img                 = get_sub_field('image');
                $header              = get_sub_field('header');
                $sub_header          = get_sub_field('sub_header');
                $editor              = get_sub_field('editor');
                $add_split_column    = get_sub_field('add_a_split_column_text_section');
                $left_column_text    = get_sub_field('left_column_text');
                $right_column_text   = get_sub_field('right_column_text');
                $add_content_footer  = get_sub_field('add_a_content_footer_section');
                $content_footer      = get_sub_field('content_footer');

                ?>
                <section class="advanced-content-section wrapper">
                	<div class="content-section-wrapper">

                		<?php

                			if ($img) { ?>
                				<img class="header-img" src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                			<?php }

                			if ($header) { ?>
                				<h2><?php echo esc_html( $header ); ?></h2>
                			<?php }

                			if ($sub_header) { ?>
                				<h3><?php echo esc_html( $sub_header ); ?></h3>
                			<?php }

                			if ($editor) { ?>
                				<?php echo $editor; ?>
                			<?php }

                			if ($add_split_column) { ?>
                				<div class="split-column-wrapper">
                					<div class="left-column"></div>
                					<div class="right-column"></div>
                				</div>
                			<?php }

                			if( have_rows('content_footer') ):

                			    ?>

								<div class="content-footer-wrapper">

                				<?php

                			    while ( have_rows('content_footer') ) : the_row();

                			        if( get_row_layout() == 'standard_button_link' ):

                			        	$url = get_sub_field('button_url');
                			        	$text = get_sub_field('button_text');

                			        	?>

                                        <a href="<?php echo esc_url( $url ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                                        <?php

                			        elseif( get_row_layout() == 'call_phone_button' ):

                			        	$phone = get_sub_field('phone_number');
                			        	$text = get_sub_field('button_text');

                			        	?>

										<a href="tel:<?php echo esc_html( $phone ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                			        	<?php

                			        elseif( get_row_layout() == 'email_button' ):

                			        	$email = get_sub_field('email_address');
                			        	$text = get_sub_field('button_text');

                			        	?>

										<a href="mailto:<?php echo esc_html( $email ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                			        	<?php

                			        elseif( get_row_layout() == 'image' ):

                			        	$img = get_sub_field('image');

                			        	?>

										<img class="footer-img" src="<?php echo $img['sizes']['flexible-content-module-footer-image']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                			        	<?php

                			        endif;

                			    endwhile;

                			    ?>

                			    </div><!-- content-footer-wrapper -->

                			    <?php

                			endif;

                		?>

                	</div>
                </section>
                <?php

            elseif( get_row_layout() == 'green_brain_section' ):

                $header     = get_sub_field('header');
                $sub_header = get_sub_field('sub_header');
                $editor     = get_sub_field('editor');

                ?>
                <section class="green-brain-section">
					<div class="content-section-wrapper">
					</div>

                </section>
                <?php

            elseif( get_row_layout() == 'green_left_image_section' ):

                $image = get_sub_field('image');
                $editor = get_sub_field('editor');

                ?>
                <section class="green-left-image-section">
					<div class="content-section-wrapper">
					</div>

                </section>
                <?php

            elseif( get_row_layout() == 'testimonial_section' ):

                $add_testimonial = get_sub_field('add_the_testimonial_carousel');

                ?>
                <section class="testimonial-section">
                    <div class="content-section-wrapper">

                        <div class="microphone-section">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="26" height="47" viewBox="0 0 26 47"><title>microphone</title><image width="26" height="47" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAvCAYAAAD9/drQAAABS2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxMzggNzkuMTU5ODI0LCAyMDE2LzA5LzE0LTAxOjA5OjAxICAgICAgICAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIi8+CiA8L3JkZjpSREY+CjwveDp4bXBtZXRhPgo8P3hwYWNrZXQgZW5kPSJyIj8+IEmuOgAAAqFJREFUWIXtlz9IlHEYx7/v2aDnFEX+CSxFxEHJTXSRojrBIUMQnBoCl6IxilocXGpxaChbEsJVWlpaXJoMpEHEwDDxAsWGBs8Q7dPg9+jHed7de4cIcg/8hnue7/f5/N7fvffe+0hFAkgAw8B7YB3Y81p3bhhIFOtTDNIDLPI/loGPXstBfhHoKReSAjLAAfAWaMujaXPtwNpUXEi3jb+BwRL0g9ZmgO5SIRGwAPwFhmJsbsieBSAqxZDyuc+UCgm8M/YWP0Jg2uKuMkBd9k6XIl4C0nEhgT8NLOXm893/TZJ+lAuyt6kU0HlJexWA9tyjKOhEogqqgqqgKug0QUAv0HxSAKAZ6BWwD8wGBYD5ChrPAwSfZ4H9hKQaScmKtl04kpJqzuDNcJqgXUnF38uOj8g9joD2JdUFuQ1JDRWAGtwjG3WS9hOSvkvqDArLkjqAxrgEezrcIxudklYTkhYktQBXXJjT4eXfjwuyJ3IPAVcltUj6ImDMP9InLiaBTb+0t8a4mlZ7NoGkc0/de0xAPbANbAC1FoxasAQceRnMA2myFmDUuVr33Abqs8LnFk0E5knn0sBIvgnBk8eINQCTQW3CuWehoQ5Y8XPvepB/CPyx4RswBTzymnIOax4EvhvutZI9pRDWA+z4nPuDfBvw2mefG5uutQX6fvfY4bhxk8PJLQPsAuPhcXE4NHcCN706CYZkH+O4vRmKTYpAH/DTO/4M3KbA1O0NpKzF3r5cXd5HDXBB0gtJ93T4N5KW9EnSV0lbll2SdE3SLUmXJR1ImpH0OIqiXwWvJg+wHXgJrOb5frKxak17rOYFoI3AALDlNUAZj6k4wDVgLa7v7P3xnStUBO5KupOTvujau5z8hyiK5sraBfCmwN2WG68K9foHxhhKjiKV7REAAAAASUVORK5CYII="/></svg>
                            <h5>testimonials</h5>
                        </div>

                        <?php

                        if ($add_testimonial) {

                            // WP_Query arguments
                            $args = array(
                                'post_type'              => array( 'testimonials' ),
                                'post_status'            => array( 'publish' ),
                                'nopaging'               => true,
                                'order'                  => 'DESC',
                                'orderby'                => 'date',
                            );

                            // The Query
                            $testimonials = new WP_Query( $args );

                            // The Loop
                            if ( $testimonials->have_posts() ) {

                                ?>

                                <div class="testimonial-carousel">

                                <?php while ( $testimonials->have_posts() ) {
                                    $testimonials->the_post();

                                    ?>

                                    <div class="cell">

                                        <?php
                                        $job_title = get_field('job_title');

                                        the_content('<p>' , '</p>');
                                        the_title('<h4>' , '</h4>');
                                        echo '<h5>'. esc_html($job_title) . '</h5>';
                                        ?>

                                    </div><!-- cell -->

                                    <?php

                                } ?>

                                </div><!-- testimonial-carousel -->

                                <?php

                            } else {

                                echo '<h4>There were no Testimonials found. Please add a testimonial in your Dashboard or remove the testimonial section from the page.</h4>';
                            }

                            // Restore original Post Data
                            wp_reset_postdata();
                        }

                        ?>

                    </div>

                </section>
                <?php

            endif;

        endwhile;

    else :

        // no layouts found

    endif;

}

