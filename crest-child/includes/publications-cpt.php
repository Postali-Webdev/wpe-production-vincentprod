<?php
/**
 * Custom Publications 
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_publications() {

// set up labels
	$labels = array(
 		'name' => 'Publications',
    	'singular_name' => 'Publication',
    	'add_new' => 'Add New Publication',
    	'add_new_item' => 'Add New Publication',
    	'edit_item' => 'Edit Publication',
    	'new_item' => 'New Publication',
    	'all_items' => 'All Publications',
    	'view_item' => 'View Publications',
    	'search_items' => 'Search Publications',
    	'not_found' =>  'No Publications Found',
    	'not_found_in_trash' => 'No Publications found in Trash', 
    	'parent_item_colon' => '',
    	'menu_name' => 'Publications',
    );
    //register post type
	register_post_type( 'Publications', array(
		'labels' => $labels,
        'menu_icon' => 'dashicons-text-page',
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt'),	
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'publications', 'with_front' => false ),
		)
	);

}

add_action( 'init', 'create_custom_post_type_publications' );