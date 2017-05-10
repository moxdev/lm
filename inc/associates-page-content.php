<?php
/**
 * Associates Page Content
 *
 *
 * @package Leading_Minds
 */

function leading_minds_associates_page_content() {

    if ( function_exists( 'get_field' ) ) {

        $img      = get_field('head_shot');
        $editor   = get_field('associate_information');
        $call_out = get_field('callout_header');  ?>

        <section id="associates-page">
            <div class="content-wrapper">

                <div class="about-section">

                    <img src="<?php echo $img['sizes']['associates-page-headshot']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                    <?php echo $editor; ?>

                </div>
                <div class="callout-section">

                    <?php echo $call_out; ?>

                </div>
                <div class="gallery-section">
                    <?php if( have_rows('bottom_images') ): ?>

                        <div class="gallery-wrapper">

                        <?php while( have_rows('bottom_images') ): the_row();

                            $image = get_sub_field('image');

                            if( !empty($image) ) : ?>

                                <img src="<?php echo $image['sizes']['associates-page-gallery-image']; ?>" alt="<?php echo $image['alt']; ?>" description="<?php echo $image['description']; ?>">

                            <?php endif; ?>

                        <?php endwhile; ?>

                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </section>

    <?php }
}