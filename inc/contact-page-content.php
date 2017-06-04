<?php
/**
 * Simple Content Section
 *
 *
 * @package Leading_Minds
 */

function leading_minds_contact_page_content() {

    if ( function_exists( 'get_field' ) ) {

        $img           = get_field('image');
        $call_section  = get_field('call_section');
        $email_section = get_field('email_section');
        $phone         = get_field('phone', 'options');
        $email         = get_field('email', 'options');
        $vt_title      = get_field('virtual_tour_section_title');
        $vt_url        = get_field('virtual_tour_section_iframe_url');


        ?>

        <section class="contact-section">
            <div class="content-section-wrapper">

                <?php

                if ($img) { ?>

                    <div class="contact-wrapper wrapper">
                        <h1>Contact Information</h1>

                        <?php

                        if ($img) { ?>

                            <figure>
                                <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                            </figure>

                        <?php }

                        if ($call_section) { ?>

                            <p class="call"><?php echo esc_html( $call_section ); ?> <a href="tel:<?php echo esc_html( $phone ); ?>"><?php echo esc_html( $phone ); ?></a></p>

                        <?php }

                        if ($email_section) { ?>

                            <p class="email"><?php echo esc_html( $email_section ); ?> <a href="mailto:<?php echo esc_html( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>

                        <?php }

                        if( have_rows('social_icons') ): ?>

                            <div class="social-icon-wrapper">

                            <?php while( have_rows('social_icons') ): the_row();

                                $img = get_sub_field('icon_image');
                                $url = get_sub_field('url');

                                ?>

                                <?php if( !empty($img) ) : ?>

                                    <a href="<?php echo esc_url( $url ); ?>"><img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>"> </a>

                                <?php endif; ?>

                            <?php endwhile; ?>

                            </div><!-- social-icon-wrapper-->

                        <?php endif;

                        ?>

                    </div><!-- contact-wrapper -->

                <?php }

                if( have_rows('office_locations') ): ?>

                    <div class="office-location-wrapper">
                        <h2>Office Locations</h2>
                        <div class="office-location-container wrapper">

                            <?php while( have_rows('office_locations') ): the_row();

                                $url = get_sub_field('iframe_url');
                                $title = get_sub_field('title');
                                $street = get_sub_field('street');
                                $address = get_sub_field('address');

                                ?>

                                <div class="office-location-box">

                                    <?php if( !empty($url) ) : ?>

                                        <iframe src="<?php echo esc_url( $url ) ?>" width="425" height="350" frameborder="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>

                                    <?php endif; ?>

                                    <?php if( !empty($title) ) : ?>

                                        <div class="location">
                                            <h3><?php echo esc_html( $title ); ?></h3>
                                            <p><?php echo esc_html( $street ); ?></p>
                                            <p><?php echo esc_html( $address ); ?></p>
                                        </div>

                                    <?php endif; ?>

                                </div>

                            <?php endwhile; ?>

                        </div>
                    </div><!-- office-location-wrapper -->

                <?php endif;

                if( $vt_title ) {
                    ?>

                    <div class="virtual-tour-wrapper">

                        <header>
                            <div class="title-wrapper">
                                <h2><?php echo esc_html( $vt_title ); ?></h2>
                            </div>
                        </header>
                        <div class="iframe-container">
                            <iframe style="border: 0;" src="<?php echo esc_url( $vt_url ); ?>" width="1200px" height="800px" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                        </div>

                    </div><!-- virtual-tour-wrapper -->

                    <?php
                }

                ?>


            </div><!-- content-section-wrapper -->
        </section>

        <?php
    }
}