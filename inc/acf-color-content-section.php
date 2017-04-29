<?php
/**
 * Color Content Section
 *
 *
 * @package Leading_Minds
 */

function leading_minds_color_content_section() {

    if ( function_exists( 'get_field' ) ) {

        $theme = get_sub_field('section_theme');

        if ( $theme ) {

            $img             = get_sub_field('image');
            $title           = get_sub_field('title');
            $sub_title       = get_sub_field('sub_title');
            $editor          = get_sub_field('editor');

            $left_title      = get_sub_field('left_section_title');
            $left_editor     = get_sub_field('left_section_editor');
            $left_btn_label  = get_sub_field('left_section_button_label');
            $left_link       = get_sub_field('left_section_button_link');

            $right_title     = get_sub_field('right_section_title');
            $right_editor    = get_sub_field('right_section_editor');
            $right_btn_label = get_sub_field('right_section_button_label');
            $right_link      = get_sub_field('right_section_button_link');

            ?>

            <section class="color-callout-section">

                <div class="<?php echo esc_html( $theme ); ?>">

                    <div class="content-section-wrapper wrapper">

                        <?php if( $img ) : ?>

                            <figure class="color-callout-img">
                                <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                            </figure>

                        <?php endif; ?>

                        <div class="editor-wrapper">

                            <?php if( $title ) : ?>

                                <h2><?php echo esc_html( $title ); ?></h2>

                            <?php endif; ?>

                            <?php if( $sub_title ) : ?>

                                <h3><?php echo esc_html( $sub_title ); ?></h3>

                            <?php endif; ?>

                            <?php if( $editor ) : ?>

                                <?php echo $editor; ?>

                            <?php endif; ?>

                        </div>

                        <div class="split-section-wrapper">

                            <div class="left-section-wrapper">

                                <?php if( $left_title ) : ?>

                                    <h3><?php echo esc_html($left_title); ?></h3>

                                <?php endif; ?>

                                <?php if( $left_editor ) : ?>

                                    <?php echo $left_editor; ?>

                                <?php endif; ?>

                                <?php if( $left_btn_label ) : ?>

                                    <a href="<?php echo esc_url( $left_link ); ?>"><button><?php echo esc_html( $left_btn_label ); ?></button></a>

                                <?php endif; ?>

                            </div><!-- left-section-wrapper -->

                            <div class="right-section-wrapper">

                                <?php if( $right_title ) : ?>

                                    <h3><?php echo esc_html($right_title); ?></h3>

                                <?php endif; ?>

                                <?php if( $right_editor ) : ?>

                                    <?php echo $right_editor; ?>

                                <?php endif; ?>

                                <?php if( $right_btn_label ) : ?>

                                    <a href="<?php echo esc_url( $right_link ); ?>"><button><?php echo esc_html( $right_btn_label ); ?></button></a>

                                <?php endif; ?>

                            </div><!-- right-section-wrapper -->

                        </div>
                    </div>

                </div>

            </section>

            <?php

        }
    }
}