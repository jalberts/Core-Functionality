<?php

/**
 * Plugin Name: Core Functionality
 * Plugin URI: https://github.com/jalberts/Core-Functionality
 * Description: This contains all your site's core functionality so that it is theme agnostic.
 * Version: 0.1.0
 * Author: Joe Alberts <jra@umich.edu>
 * @copyright    Copyright (c) 2014, Joe Alberts
 * License: GPL2 http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * 
 * Core Functionality Plugin, heavily influenced by Bill Erikson's (see readme for more).
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume 
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

/**
 * Individual feature components. Uncomment the code to activate them.
 */
 
// Plugin Directory 
//define( 'JRA_DIR', dirname( __FILE__ ) );
 
// Custom Post Types
//include_once( JRA_DIR . '/lib/functions/post-types.php' );

// Custom Taxonomies 
//include_once( JRA_DIR . '/lib/functions/taxonomies.php' );

// Metabox Class
//include_once( JRA_DIR . '/lib/functions/metaboxes.php' );
//require_once( JRA_DIR . '/lib/metabox/custom-meta-boxes.php' );
 
// Widgets
//include_once( JRA_DIR . '/lib/widgets/widget-social.php' );

// Editor Style Refresh
//include_once( JRA_DIR . '/lib/functions/editor-style-refresh.php' );

// General
include_once( JRA_DIR . '/lib/functions/general.php' );

/**
 * Activation/Deactivation
 */

// Flush Rewrite rules cache; needed when creating any new CPTs or taxonomies.
// If Custom Post Types are created after activation, deactivate and reactivate the plugin.
// To Do: Process this on registration of CPT, do avoid re-activating plugin.

function jra_corefunctionality_activate() {
	flush_rewrite_rules();
}
register_activation_hook( JRA_DIR, 'jra_corefunctionality_activate' );

function jra_corefunctionality_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'jra_corefunctionality_deactivate' );
