<?php
/**
 * Homepage Header
 *
 *
 * @package Leading_Minds
 */

function leading_minds_homepage_header() {

	if( has_post_thumbnail() ) {
		$img_url = get_the_post_thumbnail_url(); ?>

		<div class="home-feature-img" style="background-image:url(<?php echo esc_attr( $img_url ); ?>)">

			<?php if(function_exists('get_field')) {

				$on_page_title = get_field('on_page_title');
				$video_url = get_field('video_link');
				$content = get_field('home_header_content_editor');
				$add_btn = get_field('home_add_button_link');
				$btn = get_field('home_click_through_button');
				$btn_text = get_field('home_button_text');

				?>

				<div class="home-header-wrapper">

					<?php

					if( $video_url) { ?>

						<figure>
							<div class="home-header-video-wrapper">

								<iframe width="504" height="283" src="<?php echo esc_url( $video_url ); ?>" frameborder="0" allowfullscreen></iframe>

							</div>
						</figure>

					<?php }

					if( $on_page_title ) { ?>

						<header class="home-header">
							<h1 class="home-title">

							<?php echo wp_kses(
								$on_page_title,
								array(
									'span' => array(),
									'em' => array(),
									'strong' => array()
								)
							); ?>

							</h1>
						</header><!-- .home-header -->

					<?php }

					if( $content ) { ?>

						<div class="home-header-content">

							<?php echo $content; ?>

						</div><!-- .home-header-content -->

					<?php }

					if( $add_btn ) { ?>

						<div class="home-header-button-wrapper">
							<a href="<?php echo esc_url( $btn ); ?>"><button><?php echo esc_html( $btn_text ); ?></button></a>
						</div><!-- .home-button-wrapper -->

					<?php }

					?>

				</div><!-- .wrapper -->

				<?php
			} ?>

		</div><!-- .home-feature-img -->

	<?php }
}

