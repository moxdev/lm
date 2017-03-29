<?php
/**
 * Leading Minds functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Leading_Minds
 */

if ( ! function_exists( 'leading_minds_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function leading_minds_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Leading Minds, use a find and replace
	 * to change 'leading_minds' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'leading_minds', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'desktop-nav' => esc_html__( 'Primary', 'leading_minds' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	// add_theme_support( 'custom-background', apply_filters( 'leading_minds_custom_background_args', array(
	// 	'default-color' => 'ffffff',
	// 	'default-image' => '',
	// ) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'leading_minds_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function leading_minds_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'leading_minds_content_width', 640 );
}
add_action( 'after_setup_theme', 'leading_minds_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function leading_minds_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'leading_minds' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'leading_minds' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'leading_minds_widgets_init' );

/**
 * Register scripts for later use.
 */
function leading_minds_register_scripts()  {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		// Load the copy of jQuery that comes with WordPress
		// The last parameter set to TRUE states that it should be loaded in the footer.
		wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', FALSE, FALSE, TRUE);
	}

	wp_register_script( 'flickity-library', get_template_directory_uri() . '/js/min/flickity-min.js', array(), NULL, true );
}
add_action('init', 'leading_minds_register_scripts');

/**
 * Enqueue scripts and styles.
 */
function leading_minds_scripts() {

	wp_enqueue_style( 'leading_minds-style', get_stylesheet_uri() );

	wp_enqueue_script( 'leading_minds-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'leading_minds-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'leading_minds_scripts' );

/**
 * Custom ACF Options
 */
if( function_exists('acf_add_options_page') ) {
	// Company Information Section
    acf_add_options_page(array(
        'page_title'    => 'Contact Information',
        'menu_title'    => 'Contact Information',
        'menu_slug'     => 'contact-info',
        'icon_url'   	=> 'dashicons-phone',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));

    	// acf_add_options_sub_page(array(
    	//     'page_title'    => 'Contact',
    	//     'menu_title'    => 'Contact Info',
    	//     'menu_slug'     => 'contact-info',
    	//     'parent_slug'   => 'global-info',
    	// ));

    // Testimonial Section
    acf_add_options_page(array(
        'page_title'    => 'Testimonial Settings',
        'menu_title'    => 'Testimonials',
        'menu_slug'     => 'testimonials',
        'icon_url'      => 'dashicons-testimonial',
        'capability'    => 'edit_posts',
        'redirect'      => true,
        'position'      => 20
    ));

    // Associates Section
    acf_add_options_page(array(
        'page_title'    => 'Associates Settings',
        'menu_title'    => 'Associates',
        'menu_slug'     => 'associates',
        'icon_url'      => 'dashicons-id-alt',
        'capability'    => 'edit_posts',
        'redirect'      => true,
        'position'      => 21
    ));

//     	acf_add_options_sub_page(array(
//     	    'page_title'    => 'One Bedroom Floorplans Section',
//     	    'menu_title'    => 'One Bedroom',
//     	    'menu_slug'     => 'one_bedroom_floorplan',
//     	    'parent_slug'   => 'floorplans'
//     	));

//     	acf_add_options_sub_page(array(
//     	    'page_title'    => 'Two Bedroom Floorplans Section',
//     	    'menu_title'    => 'Two Bedroom',
//     	    'menu_slug'     => 'two_bedroom_floorplan',
//     	    'parent_slug'   => 'floorplans'
//     	));

//     	acf_add_options_sub_page(array(
//     	    'page_title'    => 'Three Bedroom Floorplans Section',
//     	    'menu_title'    => 'Three Bedroom',
//     	    'menu_slug'     => 'three_bedroom_floorplan',
//     	    'parent_slug'   => 'floorplans'
//     	));
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Displays the ACF flexible content.
 */

function leading_minds_flexible_content() {

    if( have_rows('acf_page_content') ):

         // loop through the rows of data
        while ( have_rows('acf_page_content') ) : the_row();

            if( get_row_layout() == 'content_section' ):

                $editor = get_sub_field('editor');

                ?>
                <section id="content-section">
                </section>
                <?php

            elseif( get_row_layout() == 'two_column_content_section' ):

                $img = get_sub_field('image');
                $header = get_sub_field('header');
                $sub_header = get_sub_field('sub_header');
                $editor = get_sub_field('editor');
                $left_column = get_sub_field('left_column_text');
                $right_column = get_sub_field('right_column_text');
                $footer_image = get_sub_field('footer_image');

                ?>
                <section id="two-column-section">
                </section>
                <?php

            elseif( get_row_layout() == 'green_brain_section' ):

                $header = get_sub_field('header');
                $sub_header = get_sub_field('sub_header');
                $editor = get_sub_field('editor');

                ?>
                <section id="green-brain-section">
                </section>
                <?php

            elseif( get_row_layout() == 'green_left_image_section' ):

                $img = get_sub_field('image');
                $editor = get_sub_field('editor');

                ?>
                <section id="green-left-image-section">
                </section>
                <?php

            endif;

        endwhile;

    else :

        // no layouts found

    endif;

}