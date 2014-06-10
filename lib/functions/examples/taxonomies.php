<?php
/**
 * Taxonomies
 *
 * This file registers any custom taxonomies.
 *
 * @package      Core_Functionality
 * @since        1.0.1
 * @link         https://github.com/jalberts/Core-Functionality
 * @author       Joe Alberts <jra@umich.edu>
 * @copyright    Copyright (c) 2013, Joe Alberts
 * @license      GPL2 http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/** 
 * Create Program Type taxonomy 
 * @author Joe Alberts <jra@umich.edu>
 * @since 1.0.1
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 * @cpt Programs
 */
 function jra_register_program_type_taxonomy() {
	$labels = array(
		'name'              => _x( 'Program Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Program Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Program Types' ),
		'all_items'         => __( 'All Program Types' ),
		'parent_item'       => __( 'Parent Program Type' ),
		'parent_item_colon' => __( 'Parent Program Type:' ),
		'edit_item'         => __( 'Edit Program Type' ),
		'update_item'       => __( 'Update Program Type' ),
		'add_new_item'      => __( 'Add New Program Type' ),
		'new_item_name'     => __( 'New Program Type Name' ),
		'menu_name'         => __( 'Program Types' ),
	); 	

	register_taxonomy( 'program-type', array('programs'), 
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'with_front' => true,
			'rewrite' => array( 'slug' => 'programs-types' ),
		)
	);
}
add_action( 'init', 'jra_register_program_type_taxonomy' );

/** 
 * Create Program Tags taxonomy
 * @author Joe Alberts <jra@umich.edu>
 * @since 1.0.1
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 * @cpt Programs
 */
 function jra_register_featured_programs_taxonomy() {
	$labels = array(
		'name'              => _x( 'Program Tags', 'taxonomy general name' ),
		'singular_name'     => _x( 'Program Tag', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Program Tags' ),
		'all_items'         => __( 'All Program Tags' ),
		'parent_item'       => __( 'Parent Program Tag' ),
		'parent_item_colon' => __( 'Parent Program Tag:' ),
		'edit_item'         => __( 'Edit Program Tag' ),
		'update_item'       => __( 'Update Program Tag' ),
		'add_new_item'      => __( 'Add New Program Tag' ),
		'new_item_name'     => __( 'New Program Tag Name' ),
		'menu_name'         => __( 'Program Tags' ),
	); 	

	register_taxonomy( 'program-tags', array('programs'), 
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'programs-tags' ),
		)
	);
}
add_action( 'init', 'jra_register_featured_programs_taxonomy' );

/** 
 * Create Affiliation taxonomy
 * @author Joe Alberts <jra@umich.edu>
 * @since 1.0.1
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 * @cpt Directory
 */
 function jra_register_dir_affiliation_taxonomy() {
	$labels = array(
		'name'              => _x( 'Affiliation', 'taxonomy general name' ),
		'singular_name'     => _x( 'Affiliation', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Affiliations' ),
		'all_items'         => __( 'All Affiliations' ),
		'parent_item'       => __( 'Parent Affiliation' ),
		'parent_item_colon' => __( 'Parent Affiliation:' ),
		'edit_item'         => __( 'Edit Affiliation' ),
		'update_item'       => __( 'Update Affiliation' ),
		'add_new_item'      => __( 'Add New Affiliation' ),
		'new_item_name'     => __( 'New Affiliation Name' ),
		'menu_name'         => __( 'Affiliations' ),
	); 	

	register_taxonomy( 'affiliation', array('directory'), 
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'affiliation' ),
		)
	);
}
add_action( 'init', 'jra_register_dir_affiliation_taxonomy' );

/** 
 * Create Type taxonomy
 * @author Joe Alberts <jra@umich.edu>
 * @since 1.0.1
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 * @cpt Publications
 */
 function jra_register_publication_type_taxonomy() {
	$labels = array(
		'name'              => _x( 'Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Types' ),
		'all_items'         => __( 'All Types' ),
		'parent_item'       => __( 'Parent Type' ),
		'parent_item_colon' => __( 'Parent Type:' ),
		'edit_item'         => __( 'Edit Type' ),
		'update_item'       => __( 'Update Type' ),
		'add_new_item'      => __( 'Add New Type' ),
		'new_item_name'     => __( 'New Type Name' ),
		'menu_name'         => __( 'Types' ),
	); 	

	register_taxonomy( 'type', array('publications'), 
		array(
			'hierarchical' => false,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'type' ),
		)
	);
}
add_action( 'init', 'jra_register_publication_type_taxonomy' );
