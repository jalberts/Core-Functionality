<?php
/**
 * Post Types
 *
 * This file registers any custom post types
 *
 * @package      Core_Functionality
 * @since        0.1.0
 * @link         https://github.com/jalberts/Core-Functionality
 * @author       Joe Alberts <jra@umich.edu>
 * @copyright    Copyright (c) 2013, Joe Alberts
 * @license      GPL2 http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/** 
 * Create Programs post type
 * @author Joe Alberts <jra@umich.edu>
 * @since 0.1.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Register CPT
function jra_register_programs_post_type() {
	$labels = array(
		'name'               => _x( 'Programs', 'post type general name' ),
		'singular_name'      => _x( 'Program', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'program' ),
		'add_new_item'       => __( 'Add New Program' ),
		'edit_item'          => __( 'Edit Program' ),
		'new_item'           => __( 'New Program' ),
		'all_items'          => __( 'All Programs' ),
		'view_item'          => __( 'View Program' ),
		'search_items'       => __( 'Search Programs' ),
		'not_found'          => __( 'No programs found' ),
		'not_found_in_trash' => __( 'No programs found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Programs'
	);

	$args = array(
		'labels' => $labels,
		'description' => 'All current and past programs.',
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bat' => false,
		'menu_position' => 10,
		'menu_icon' => 'dashicons-analytics',
		//'capability_type' => '',
		//'capabilities' => '',
		//'map_meta_cap' => false,
		'hierarchical' => false,
		'supports' => array( 'title', 'revisions', 'thumbnail', 'genesis-cpt-archives-settings' ),
		//'register_meta_box_cb' => '',
		//'taxonomies' = array(),
		'has_archive' => true,
		'rewrite' => true,
		'query_var' => true,
		'can_export' => true
	);
	
	register_post_type( 'programs', $args );
	
}
add_action( 'init', 'jra_register_programs_post_type' );

// Update Messages customization
// Adds filter to ensure the CPT name is displayed appropriately when user updates one.
function jra_programs_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['programs'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Program updated. <a href="%s">View program</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Program updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Program restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Program published. <a href="%s">View program</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Program saved.'),
    8 => sprintf( __('Program submitted. <a target="_blank" href="%s">Preview program</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Program scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview program</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Program draft updated. <a target="_blank" href="%s">Preview program</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
add_filter( 'post_updated_messages', 'jra_programs_updated_messages' );

// Change title text
function jra_programs_title_text( $title) {
	$screen = get_current_screen();
 
	if  ( 'programs' == $screen->post_type ) {
		$title = 'Program Name';
	}
	
	return $title;
}
add_filter( 'enter_title_here', 'jra_programs_title_text' );

// Remove unneeded meta boxes from this post type
function jra_programs_remove_metaboxes() {
	remove_meta_box( 'socialize-buttons-meta', 'programs', 'side' );
	remove_meta_box( 'socialize-action-meta', 'programs', 'normal' );
}
// add_action( 'do_meta_boxes', 'jra_programs_remove_metaboxes' );

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

// Remove unneeded meta boxes from this post type
function jra_directory_remove_metaboxes() {
	remove_meta_box( 'socialize-buttons-meta', 'directory', 'side' );
	remove_meta_box( 'socialize-action-meta', 'directory', 'normal' );
}
add_action( 'do_meta_boxes', 'jra_directory_remove_metaboxes' );

/** 
 * Create Publications post type
 * @author Joe Alberts <jra@umich.edu>
 * @since 0.1.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 *
 * Removed to avoid confusion until it can be fully implemented.
 * To re-enable, simply uncomment each action and filter below.
 */

// Register CPT
function jra_register_publications_post_type() {
	$labels = array(
		'name'               => _x( 'Publications', 'post type general name' ),
		'singular_name'      => _x( 'Publication', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'publication' ),
		'add_new_item'       => __( 'Add New Publication' ),
		'edit_item'          => __( 'Edit Publication' ),
		'new_item'           => __( 'New Publication' ),
		'all_items'          => __( 'All Publications' ),
		'view_item'          => __( 'View Publication' ),
		'search_items'       => __( 'Search Publications' ),
		'not_found'          => __( 'No publications found' ),
		'not_found_in_trash' => __( 'No publications found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Publications'
	);

	$args = array(
		'labels' => $labels,
		'description' => 'All publications associated with the CMCD.',
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_menu' => true,
		'show_in_admin_bat' => false,
		'menu_position' => 10,
		'menu_icon' => 'dashicons-book',
		//'capability_type' => '',
		//'capabilities' => '',
		//'map_meta_cap' => false,
		'hierarchical' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		//'register_meta_box_cb' => '',
		//'taxonomies' = array(),
		'has_archive' => true,
		'rewrite' => true,
		'query_var' => true,
		'can_export' => true,
	);
	
	register_post_type( 'publications', $args );
	
}
// add_action( 'init', 'jra_register_publications_post_type' );

// Update Messages customization
// Adds filter to ensure the CPT name is displayed appropriately when user updates one.
function jra_publications_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['publications'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Publication updated. <a href="%s">View publication</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Publication updated.'),
    /* translators: %s: date and time of the revision */
    5 => isset($_GET['revision']) ? sprintf( __('Publication restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Publication published. <a href="%s">View publication</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Publication saved.'),
    8 => sprintf( __('Publication submitted. <a target="_blank" href="%s">Preview publication</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Publication scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview publication</a>'),
      // translators: Publish box date format, see http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Publication draft updated. <a target="_blank" href="%s">Preview publication</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}
// add_filter( 'post_updated_messages', 'jra_publications_updated_messages' );

// Change title text
function jra_publications_title_text( $title) {
	$screen = get_current_screen();
 
	if  ( 'publications' == $screen->post_type ) {
		$title = 'Publication Title';
	}
	
	return $title;
}
// add_filter( 'enter_title_here', 'jra_publications_title_text' );

// Remove unneeded meta boxes from this post type
function jra_publications_remove_metaboxes() {
	remove_meta_box( 'socialize-buttons-meta', 'publications', 'side' );
	remove_meta_box( 'socialize-action-meta', 'publications', 'normal' );
}
// add_action( 'do_meta_boxes', 'jra_publications_remove_metaboxes' );
