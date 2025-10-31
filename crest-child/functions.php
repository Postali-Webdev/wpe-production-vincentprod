<?php

// Adding Custom Post Types
require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
require_once dirname( __FILE__ ) . '/includes/publications-cpt.php'; // Custom Post Type Testimonials
require_once dirname( __FILE__ ) . '/includes/events-presentations-cpt.php'; // Custom Post Type Testimonials

add_action('wp_enqueue_scripts', 'postali_child_scripts');
function postali_child_scripts() {

    wp_enqueue_style( 'child-stylesheet', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
    wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue Child theme styles.css

    wp_enqueue_style( 'block-styles', get_stylesheet_directory_uri() . '/blocks/assets/css/styles.css'); // Enqueue Child theme styles.css
    
    // Compiled .js using Grunt.js
    wp_register_script('child-custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
    wp_enqueue_script('child-custom-scripts');
    
    // slick
    wp_register_script('child-slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
    wp_enqueue_script('child-slick-custom');

    // slick
    wp_register_script('smooth-scroll-custom', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-custom.min.js',array('jquery'), null, true); 
    wp_enqueue_script('smooth-scroll-custom');

    // lity
    wp_register_script('lity-scripts', get_stylesheet_directory_uri() . '/assets/js/lity.js',array('jquery'), null, true); 
    wp_enqueue_script('lity-scripts');	

    // icomoon
    wp_register_style( 'icomoon', 'https://cdn.icomoon.io/152819/GregVincent/style.css?cyth2l', array() );
    wp_enqueue_style('icomoon');
    
}

// ACF Options Pages
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Customizations',
        'menu_title'    => 'Customizations',
        'menu_slug'     => 'customizations',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Awards',
        'menu_title'    => 'Awards',
        'menu_slug'     => 'awards',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Locations',
        'menu_title'    => 'Locations',
        'menu_slug'     => 'locations',
        'capability'    => 'edit_posts',
        'icon_url'      => 'dashicons-location', // Add this line and replace the second inverted commas with class of the icon you like
        'redirect'      => false
    ));

}

// Save newly created fields to child theme
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;

}

// Function to create shortcode for embedding phone number from ACF options
function acf_phone_shortcode($atts, $content = null) {
    // Retrieve the phone number from ACF options
    $phone_number = get_field('global_phone', 'options');

    // Check if phone number is available
    if ($phone_number) {
        // Return the phone number wrapped in a link
        return '<a class="btn" href="tel:' . esc_attr($phone_number) . '">' . esc_html($phone_number) . '</a>';
    } else {
        // Return a default message if phone number is not set
        return '<span class="btn blue">Phone number not available</span>';
    }
}

// Register the shortcode
add_shortcode('phone', 'acf_phone_shortcode');

add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

/* ACF Register Blocks */
function postali_crest_register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/txt-button' );
    register_block_type( __DIR__ . '/blocks/about-achievements' );
    register_block_type( __DIR__ . '/blocks/accordions' );
    register_block_type( __DIR__ . '/blocks/accordions-horizontal' );
    register_block_type( __DIR__ . '/blocks/slider-process' );
    register_block_type( __DIR__ . '/blocks/tabs' );
    register_block_type( __DIR__ . '/blocks/attorneys-block' );
    register_block_type( __DIR__ . '/blocks/cta-block' );
    register_block_type( __DIR__ . '/blocks/map-block' );
    register_block_type( __DIR__ . '/blocks/video-block' );
    register_block_type( __DIR__ . '/blocks/awards-block' );
    register_block_type( __DIR__ . '/blocks/contact-block' );
    register_block_type( __DIR__ . '/blocks/results-scroller' );
    register_block_type( __DIR__ . '/blocks/testimonials' );
    register_block_type( __DIR__ . '/blocks/testimonials-large' );
    register_block_type( __DIR__ . '/blocks/columns' );
    register_block_type( __DIR__ . '/blocks/link-block' );
    register_block_type( __DIR__ . '/blocks/related-resources' );
    register_block_type( __DIR__ . '/blocks/banner-block' );
    register_block_type( __DIR__ . '/blocks/button' );
    register_block_type( __DIR__ . '/blocks/transcript' );
    register_block_type( __DIR__ . '/blocks/homepage-tabs' );
    register_block_type( __DIR__ . '/blocks/publications' );
    register_block_type( __DIR__ . '/blocks/recent-articles' );
    register_block_type( __DIR__ . '/blocks/events' );
    
}
add_action( 'init', 'postali_crest_register_acf_blocks' );


function remove_yoast_og_tags( $ogTag ){
    // Do a check of which type of post you want to remove the tags from
    if ( is_page() ) {
        return false;
    }
    return $ogTag;
}
add_filter( 'wpseo_meta_author', '__return_false' );


function retrieve_latest_gform_submissions() {
	$site_url = get_site_url();
	$search_criteria = [
		'status' => 'active'
	];
	$form_ids = 1; //search all forms
	$sorting = [
		'key' => 'date_created',
		'direction' => 'DESC'
	];
	$paging = [
		'offset' => 0,
		'page_size' => 5
	];
	
	$submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
	$start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
	$end_date = date('Y-m-d H:i:s');
	$entry_in_last_5_days = false;
	
	foreach ($submissions as $submission) {
		if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
			$entry_in_last_5_days = true;
		} 
	}

	if( !$entry_in_last_5_days ) {
		wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
	}

}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

/**
 * Disable Theme/Plugin File Editors in WP Admin
 * - Hides the submenu items
 * - Blocks direct access to editor screens
 */
function postali_disable_file_editors_menu() {
    // Remove Theme File Editor from Appearance menu
    remove_submenu_page( 'themes.php', 'theme-editor.php' );
    // Optional: also remove Plugin File Editor from Plugins menu
    remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
}
add_action( 'admin_menu', 'postali_disable_file_editors_menu', 999 );

// Block direct access to the editors even if someone knows the URL
function postali_block_file_editors_direct_access() {
    wp_die( __( 'File editing through the WordPress admin is disabled.' ), 403 );
}
add_action( 'load-theme-editor.php', 'postali_block_file_editors_direct_access' );
add_action( 'load-plugin-editor.php', 'postali_block_file_editors_direct_access' );

/**
 * Disable the Additional CSS panel in the Customizer.
 * Primary method: remove the custom_css component early in load.
 */
function postali_disable_customizer_additional_css_component( $components ) {
    $key = array_search( 'custom_css', $components, true );
    if ( false !== $key ) {
        unset( $components[ $key ] );
    }
    return $components;
}
add_filter( 'customize_loaded_components', 'postali_disable_customizer_additional_css_component' );

/**
 * Fallback: remove the Additional CSS section if it's present.
 */
function postali_remove_customizer_additional_css_section( $wp_customize ) {
    if ( method_exists( $wp_customize, 'remove_section' ) ) {
        $wp_customize->remove_section( 'custom_css' );
    }
}
add_action( 'customize_register', 'postali_remove_customizer_additional_css_section', 20 );