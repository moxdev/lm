<?php
/**
 * Associates Section Module
 *
 *
 * @package Leading_Minds
 */

function leading_minds_associates_section() {

    if ( function_exists( 'get_field' ) ) {

        $title = get_sub_field('title');
        $sub_title = get_sub_field('sub_title');
        $editor = get_sub_field('editor');

        ?>
        <section class="associates-section wrapper">
            <div class="content-section-wrapper">

                <?php

                if ($title) {
                    echo '<h2>' . esc_html( $title ) . '</h2>';
                }

                if ($sub_title) {
                    echo '<h3>' . esc_html( $sub_title ) . '</h3>';
                }

                if ($editor) {
                    echo $editor;
                }

                if( have_rows( 'associates_information', 'option' ) ): ?>

                    <div class="flex-wrapper">

                    <?php while( have_rows( 'associates_information', 'option' ) ): the_row();
                        $img = get_sub_field('associates_img');
                        $name  = get_sub_field('associates_name');
                        $title = get_sub_field('associates_title');
                        $page = get_sub_field('associates_page');

                        ?>

                        <div class="associate-block">

                            <a href="<?php echo esc_url( $page ); ?>">

                                <?php if( $img ): ?>

                                    <img src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>" description="<?php echo $img['description']; ?>">

                                <?php endif; ?>


                                <?php if( $name ): ?>

                                    <?php echo '<h4>' . esc_html( $name ) . '</h4>'; ?>

                                <?php endif; ?>

                                <?php if( $title ): ?>

                                    <?php echo '<h5>' . esc_html( $title ) . '</h5>'; ?>

                                <?php endif; ?>

                            </a><!-- associate-link -->

                        </div><!-- associate-block -->

                    <?php endwhile; ?>

                    </div><!-- flex-wrapper -->

                <?php endif;

                ?>

            </div>

        </section><!-- associates-section wrapper -->
        <?php
    }
}