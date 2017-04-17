<?php
/**
 * Flexible Content Module Function
 *
 *
 * @package Leading_Minds
 */

function leading_minds_flexible_content_module() {

    if( have_rows('acf_page_content') ):

        while ( have_rows('acf_page_content') ) : the_row();

            if( get_row_layout() == 'simple_content_section' ):

                if ( function_exists( 'leading_minds_simple_content_section' ) ):
                    leading_minds_simple_content_section();
                endif;

            elseif( get_row_layout() == 'advanced_content_section' ):

                if( function_exists( 'leading_minds_advanced_content_section' ) ):
                    leading_minds_advanced_content_section();
                endif;

            elseif( get_row_layout() == 'color_content_section' ):

                if ( function_exists( 'leading_minds_color_content_section' ) ):
                    leading_minds_color_content_section();
                endif;

            elseif( get_row_layout() == 'mid_page_navigation' ):

                if( function_exists('leading_minds_mid_page_navigation_section') ):
                    leading_minds_mid_page_navigation_section();
                endif;

            elseif( get_row_layout() == 'testimonial_section' ):

                if( function_exists('leading_minds_testimonial_section') ):
                    leading_minds_testimonial_section();
                endif;

            elseif( get_row_layout() == 'associates_section' ):

                if ( function_exists( 'leading_minds_associates_section' ) ):
                    leading_minds_associates_section();
                endif;

            endif;

        endwhile;
    else :
        // no layouts found
    endif;

}

