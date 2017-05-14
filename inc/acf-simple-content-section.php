<?php
/**
 * Simple Content Section
 *
 *
 * @package Leading_Minds
 */

function leading_minds_simple_content_section() {

    if ( function_exists( 'get_field' ) ) {

        $bg_color             = get_sub_field('section_background_color');
        $title                = get_sub_field('title');
        $sub_title            = get_sub_field('sub_title');
        $editor               = get_sub_field('editor');

        $add_skills           = get_sub_field('add_skills_section');
        $add_secondary_editor = get_sub_field( 'add_seconday_editor' );

        ?>

        <section class="simple-content-section">

            <div class="<?php echo esc_html( $bg_color ); ?>">

                <div class="content-section-wrapper">
                    <div class="editor-wrapper">

                    <?php

                    if ($title) { ?>
                        <h2><?php echo esc_html( $title ); ?></h2>
                    <?php }

                    if ($sub_title) { ?>
                        <h3><?php echo esc_html( $sub_title ); ?></h3>
                    <?php }

                    if ($editor) { ?>
                        <div class="text-wrapper">
                            <?php echo $editor; ?>
                        </div>
                    <?php }

                    if ($add_skills) {
                        $skills = get_sub_field('skills');
                        if( have_rows('skills') ):

                        ?>

                        <div class="skills-wrapper">

                            <?php while( have_rows('skills') ): the_row();
                                $skill = get_sub_field('skill');
                                ?>

                                <div class="skill">

                                <?php if( !empty($skill) ) : ?>
                                    <?php echo esc_html( $skill); ?>
                                <?php endif; ?>

                                </div>

                            <?php endwhile;

                        ?>

                        </div><!-- skills-wrapper -->

                        <?php

                    endif; }

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

                    ?>

                    </div><!-- editor-wrapper -->
                </div><!-- content-section-wrapper -->
            </div><!-- bg-color -->

        </section>

        <?php
    }
}