<?php

/**
 * Metaboxes
 *
 * This file registers any custom metaboxes.
 * It relies on the [Custom Meta Boxes, by HumanMade](https://github.com/humanmade/Custom-Meta-Boxes/).
 *
 * @package      Core-Functionality
 * @since        0.1.0
 * @link         https://github.com/jalberts/Core-Functionality
 * @author       Joe Alberts <jra@umich.edu>
 * @copyright    Copyright (c) 2014, Joe Alberts
 * @license      GPL2 http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Create Metaboxes
 * @since 0.1.0
 * @author Joe Alberts <jra@umich.edu>
 * 
 * @cpt Custom Post Type name
 */

//-- For examples, see examples/metaboxes.php

/**
 * Initialize Metabox Class
 * @since 1.0.1
 * see /lib/metabox/example-functions.php for more information
 *
 * This is not working with the humanmade fork. Investigate further later.
 * Currently initialized in the main plugin file.
 */

//function jra_initialize_cmb_meta_boxes() {
	//if ( ! class_exists( 'cmb_Meta_Box' ) ) {
		//require_once( JRA_DIR . '/lib/metabox/custom-meta-boxes.php' );
	//}
//}
//add_action( 'init', 'jra_initialize_cmb_meta_boxes', 9999 );