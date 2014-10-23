<?php

/**
 * Taxonomies
 *
 * This file registers any custom taxonomies.
 *
 * @package      Core-Functionality
 * @since        0.1.0
 * @link         https://github.com/jalberts/Core-Functionality
 * @author       Joe Alberts <jra@umich.edu>
 * @copyright    Copyright (c) 2013, Joe Alberts
 * @license      GPL2 http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
 
//-- For comprehensive examples, see examples/taxonomies.php

/** 
 * Create Affiliation taxonomy
 * @author Joe Alberts <jra@umich.edu>
 * @since 0.1.0
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
