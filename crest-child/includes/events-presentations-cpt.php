<?php
/**
 * Custom Events / Presentations 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_events_presentations() {

// set up labels
	$labels = array(
 		'name' => 'Events / Presentations',
    	'singular_name' => 'Events / Presentations',
    	'add_new' => 'Add New Events / Presentations',
    	'add_new_item' => 'Add New Events / Presentations',
    	'edit_item' => 'Edit Events / Presentations',
    	'new_item' => 'New Events / Presentations',
    	'all_items' => 'All Events / Presentations',
    	'view_item' => 'View Events / Presentations',
    	'search_items' => 'Search Events / Presentations',
    	'not_found' =>  'No Events / Presentations Found',
    	'not_found_in_trash' => 'No Events / Presentations found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Events / Presentations',
    );
    //register post type
	register_post_type( 'Events / Presentations', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-text-page',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'events-presentations', 'with_front' => false ),
		)
	);

}

add_action( 'init', 'create_custom_post_type_events_presentations' );