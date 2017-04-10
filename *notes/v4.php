// check if the flexible content field has rows of data
<?php

if ( $add_content_footer ) { ?>

    <div class="content-footer-wrapper">

    <?php

    if( have_rows('content_footer') ):

         // loop through the rows of data
        while ( have_rows('content_footer') ) : the_row();

            if( get_row_layout() == 'image' ):

                the_sub_field('text');

            elseif( get_row_layout() == 'download' ):

                $file = get_sub_field('file');

            endif;

        endwhile;

    else :

        // no layouts found

    endif;


}


?>