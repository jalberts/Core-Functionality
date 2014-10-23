<?php

/**
 * Post Types
 *
 * This file registers any custom post types
 *
 * @package      Core-Functionality
 * @since        0.1.0
 * @link         https://github.com/jalberts/Core-Functionality
 * @author       Joe Alberts <jra@umich.edu>
 * @copyright    Copyright (c) 2014, Joe Alberts
 * @license      GPL2 http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

//-- For comprehensive examples, see examples/post-types.php

/** 
 * Create Directory post type
 * @author Joe Alberts <jra@umich.edu>
 * @since 0.1.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Register CPT
function jra_register_directory_post_type() {
	$labels = array(
		'name'               => _x( 'People', 'post type general name' ),
		'singular_name'      => _x( 'Person', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'person' ),
		'add_new_item'       => __( 'Add New Person' ),
		'edit_item'          => __( 'Edit Person' ),
		'new_item'           => __( 'New Person' ),
		'all_items'          => __( 'All People' ),
		'view_item'          => __( 'View Person' ),
		'search_items'       => __( 'Search People' ),
		'not_found'          => __( 'No people found' ),
		'not_found_in_trash' => __( 'No people found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Directory'
	);

	$args = array(
		'labels' => $labels,
		'description' => 'All people associated with the CMCD.',
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bat' => false,
		'menu_position' => 10,
		'menu_icon' => 'dashicons-groups',
		//'capability_type' => '',
		//'capabilities' => '',
		//'map_meta_cap' => false,
		'hierarchical' => false,
		'supports' => array( 'title', 'revisions', 'genesis-cpt-archives-settings' ),
		//'register_meta_box_cb' => '',
		//'taxonomies' = array(),
		'has_archive' => true,
		'rewrite' => true,
		'query_var' => true,
		'can_export' => true,
	);
	
	register_post_type( 'directory', $args );
	
}
add_action( 'init', 'jra_register_directory_post_type' );

// Update Messages customization
// Adds filter to ensure the CPT name is displayed appropriately when user updates one.
function jra_directory_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['directory'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Person updated. <a href="%s">View person</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Person updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Person restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Person published. <a href="%s">View person</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Person saved.'),
    8 => sprintf( __('Person submitted. <a target="_blank" href="%s">Preview person</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Person scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview person</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Person draft updated. <a target="_blank" href="%s">Preview person</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'jra_directory_updated_messages' );

// Change title text
function jra_directory_title_text( $title) {
	$screen = get_current_screen();
 
	if  ( 'directory' == $screen->post_type ) {
		$title = 'Full Name and Honorific';
	}
	
	return $title;
}
add_filter( 'enter_title_here', 'jra_directory_title_text' );
