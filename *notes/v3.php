<div id="getstartedprograms" class="get-started-programs">

    <div class="container">

    <?php if( have_rows('get_started_programs') ): ?>

        <?php while ( have_rows('get_started_programs') ) : the_row(); ?>

            <div class="row program">

                <div class="col-sm-7">
                    <div class="title"><?php the_sub_field('title'); ?></div>
                    <div class="body-copy"><?php the_sub_field('body_copy'); ?></div>
                </div>

                <div class="col-sm-4 col-sm-offset-1">

                    <div class="program-pricing">

                        <div class="row schedule-pricing">

                            <div class="col-sm-12 schedule">
                                <?php if(get_sub_field('pricing')) { ?>
                                    $<?php the_sub_field('pricing'); ?>
                                <?php } ?>
                                <?php if(get_sub_field('schedule')) { ?>
                                    <small>(<?php the_sub_field('schedule'); ?>)</small>
                                <?php } ?>
                            </div>

                        </div>

                        <?php if(get_sub_field('sidebar_copy')) { ?>
                        <div class="row sidebar-copy">
                            <div class="col-sm-12">
                                <?php the_sub_field('sidebar_copy'); ?>
                            </div>
                        </div>
                        <?php } ?>

                        <?php while(has_sub_field("link_flexible_content")):

                            if(get_row_layout() == "external_link"):

                                echo 'external';

                            elseif(get_row_layout() == "internal_link"):

                                echo 'internal';

                            elseif(get_row_layout() == "get_started_form"):

                                echo 'form';

                            endif;

                        endwhile; ?>

                    </div>

                </div>

            </div>

        <?php endwhile; ?>

    <?php endif; ?>

</div>