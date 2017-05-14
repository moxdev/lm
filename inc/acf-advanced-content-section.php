<?php
/**
 * Advanced Content Section Module
 *
 *
 * @package Leading_Minds
 */

function leading_minds_advanced_content_section() {

    if ( function_exists( 'get_field' ) ) {

        $bg_color             = get_sub_field('section_background_color');
        $img                  = get_sub_field('image');
        $title                = get_sub_field('title');
        $sub_title            = get_sub_field('sub_title');
        $editor               = get_sub_field('editor');

        $add_split_column     = get_sub_field('add_a_split_column_text_section');
        $add_skills           = get_sub_field('add_skills_section');
        $add_secondary_editor = get_sub_field( 'add_secondary_editor_section' );
        $add_content_footer   = get_sub_field('add_a_content_footer_section');

        ?>
        <section class="advanced-content-section">

            <div class="<?php echo esc_html( $bg_color ); ?>">

                <div class="content-section-wrapper wrapper">

                    <?php

                    if ($img) { ?>
                        <img class="header-img" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">
                    <?php }

                    // Header
                    if ($title) { ?>
                        <h2><?php echo esc_html( $title ); ?></h2>
                    <?php }

                    //Sub Header
                    if ($sub_title) { ?>
                        <h3><?php echo esc_html( $sub_title ); ?></h3>
                    <?php }

                    // Editor
                    if ($editor) { ?>
                        <div class="editor-wrapper">
                            <?php echo $editor; ?>
                        </div>

                    <?php }

                    // Split Column
                    if ($add_split_column) {

                        $col_number         = get_sub_field('col_number');
                        $left_column_text   = get_sub_field('left_column_text');
                        $middle_column_text = get_sub_field('middle_column_text');
                        $right_column_text  = get_sub_field('right_column_text');

                        ?>

                        <div class="split-column-wrapper">

                            <?php if ( $col_number == 2 || $col_number == 3 ) {

                                ?>
                                <div class="left-column">
                                    <div class="column-wrapper">

                                        <?php echo $left_column_text; ?>

                                    </div>
                                </div>

                                <?php

                            } ?>

                            <?php if ( $col_number == 3 ) {

                                ?>

                                <div class="middle-column">
                                    <div class="column-wrapper">

                                        <?php echo $middle_column_text; ?>

                                    </div>
                                </div>

                                <?php

                            } ?>

                            <?php if ( $col_number == 2 || $col_number == 3 ) {

                                ?>

                                <div class="right-column">
                                    <div class="column-wrapper">

                                        <?php echo $right_column_text; ?>

                                    </div>
                                </div>

                                <?php

                            } ?>

                        </div><!-- split-column-wrapper -->

                    <?php }

                    // Skills
                    if ($add_skills) {
                        $skills = get_sub_field('skills');

                        if( have_rows('skills') ): ?>

                            <div class="skills-wrapper">

                            <?php while( have_rows('skills') ): the_row();
                                $skill = get_sub_field('skill');
                                ?>

                                <div class="skill">

                                    <?php if( !empty($skill) ) : ?>
                                        <?php echo esc_html( $skill); ?>
                                    <?php endif; ?>

                                </div>

                            <?php endwhile; ?>

                            </div><!-- skills-wrapper -->

                        <?php endif;
                    }

                    // Secondary Editor
                    if ($add_secondary_editor) {

                        if( have_rows('secondary_content') ): ?>

                            <div class="secondary-content-wrapper">

                            <?php while( have_rows('secondary_content') ): the_row();

                                $title = get_sub_field('title');
                                $sub_title = get_sub_field('sub_title');
                                $editor = get_sub_field('content');

                                ?>

                                <div class="secondary-content">

                                    <?php if( !empty($title) ) : ?>

                                        <h2><?php echo esc_html( $title); ?></h2>

                                    <?php endif; ?>

                                    <?php if( !empty($sub_title) ) : ?>

                                        <h3><?php echo esc_html( $sub_title); ?></h3>

                                    <?php endif; ?>

                                    <?php if( !empty($editor) ) :

                                        echo $editor;

                                    endif; ?>

                                </div>

                            <?php endwhile; ?>

                            </div><!-- secondary-content-wrapper -->

                        <?php endif;
                    }

                    // Content Footer
                    if ($add_content_footer) {

                        if( have_rows('content_footer') ):

                            ?>

                            <div class="content-footer-wrapper">

                                <?php

                                 // loop through the rows of data
                                while ( have_rows('content_footer') ) : the_row();

                                    if( get_row_layout() == 'footer_editor' ):

                                        $editor = get_sub_field('editor');

                                        ?>

                                        <div class="footer-editor-wrapper">

                                            <?php echo $editor; ?>

                                        </div>

                                        <?php

                                    elseif( get_row_layout() == 'image' ):

                                        $img = get_sub_field('image');
                                        $title = get_sub_field('title');
                                        $sub = get_sub_field('sub_title');

                                        if( $img ) : ?>

                                            <div class="img-wrapper">

                                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                                                <?php if( $title ) { ?>

                                                    <div class="img-title">
                                                        <?php echo esc_html( $title ); ?>
                                                        <?php echo ( $sub ); ?>
                                                    </div>

                                                <?php

                                                } ?>


                                            </div>

                                        <?php endif;

                                    elseif( get_row_layout() == 'standard_button_link' ):

                                        $url = get_sub_field('button_url');
                                        $text = get_sub_field('button_text');

                                        ?>

                                        <div class="btn-wrapper">
                                            <a href="<?php echo esc_url( $url ); ?>"><button class="green-btn"><?php echo esc_html( $text ); ?></button></a>
                                        </div>

                                        <?php

                                    elseif( get_row_layout() == 'call_phone_button' ):

                                        $phone = get_sub_field('phone_number');
                                        $text = get_sub_field('button_text');

                                        ?>

                                        <div class="btn-wrapper">
                                            <a href="tel:<?php echo esc_html( $phone ); ?>"><button class="green-btn"><?php echo esc_html( $text ); ?></button></a>
                                        </div>

                                        <?php

                                    elseif( get_row_layout() == 'email_button' ):

                                        $email = get_sub_field('email_address');
                                        $text = get_sub_field('button_text');

                                        ?>

                                        <div class="btn-wrapper">
                                            <a href="mailto:<?php echo esc_html( $email ); ?>"><button class="green-btn"><?php echo esc_html( $text ); ?></button></a>
                                        </div>

                                        <?php

                                    endif;

                                endwhile;

                                ?>

                            </div>

                            <?php

                        else :

                            echo '<h4>There were no Content Footer Sections Found. Please add some sections to the Content Footer Section on this page.</h4>';

                        endif;
                    }

                    ?>

                </div><!-- content-section-wrapper -->
            </div>
        </section>

        <?php
    }
}