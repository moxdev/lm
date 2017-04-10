if( $add_content_footer ) :

    if( have_rows('content_footer') ): ?>

    <div class="content-footer-wrapper">

        <?php

        while ( have_rows('content_footer') ) : the_row();

            if( get_row_layout() == 'image' ):

                $img = get_sub_field('image');

                if( $img ) : ?>

                    <img class="footer-img" src="<?php echo $img['sizes']['flexible-content-module-footer-image']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                <?php endif;

            elseif( get_row_layout() == 'footer_editor' ):

                $editor = get_sub_field('editor');

                if( $footer_editor ) : ?>

                    <div class="footer-editor-wrapper">
                        <?php echo $editor; ?>
                    </div>

                <?php endif;

            elseif( get_row_layout() == 'standard_button_link' ):

                $url = get_sub_field('button_url');
                $text = get_sub_field('button_text');

                if( $text ) : ?>

                    <a href="<?php echo esc_url( $url ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                <?php endif;

            elseif( get_row_layout() == 'call_phone_button' ):

                $phone = get_sub_field('phone_number');
                $text = get_sub_field('button_text');

                if( $text ) : ?>

                    <a href="tel:<?php echo esc_html( $phone ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                <?php endif;

            elseif( get_row_layout() == 'email_button' ):

                $email = get_sub_field('email_address');
                $text = get_sub_field('button_text');

                if( $text ) : ?>

                    <a href="mailto:<?php echo esc_html( $email ); ?>"><button><?php echo esc_html( $text ); ?></button></a>

                <?php endif;

            endif;

        endwhile;

        ?>


    </div><!-- content-footer-wrapper -->

    <?php endif;

endif;