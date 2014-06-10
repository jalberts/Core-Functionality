<?php # -*- coding: utf-8 -*-

/**
 * Plugin Name: T5 Fresh Editor Stylesheets
 * Description: Enforces fresh editor stylesheets per version parameter.
 * Version:     2012.08.09
 * Author:      Thomas Scholz
 * Plugin URI:  http://toscho.de/?p=1965
 * Author URI:  http://toscho.de
 * License:     MIT
 * License URI: http://www.opensource.org/licenses/mit-license.php
 *
 * @since: 0.1.0
 */
 
if ( ! function_exists( 't5_fresh_editor_style' ) )
{
	add_filter( 'mce_css', 't5_fresh_editor_style' );
 
	/**
	 * Adds a parameter of the last modified time to all editor stylesheets.
	 *
	 * Modified copy of _WP_Editors::editor_settings()
	 *
	 * @wp-hook mce_css
	 * @param  string $css Comma separated stylesheet URIs
	 * @return string
	 */
	function t5_fresh_editor_style( $css )
	{
		global $editor_styles;
 
		if ( empty ( $css ) or empty ( $editor_styles ) )
		{
			return $css;
		}
 
		$mce_css = array();
 
		// Load parent theme styles first, so the child theme can overwrite it.
		if ( is_child_theme() )
		{
			t5_refill_editor_styles(
				$mce_css,
				get_template_directory(),
				get_template_directory_uri()
			);
		}
 
		t5_refill_editor_styles(
			$mce_css,
			get_stylesheet_directory(),
			get_stylesheet_directory_uri()
		);
 
		return implode( ',', $mce_css );
	}
 
	/**
	 * Add version parameter to each stylesheet uri.
	 *
	 * @param  array  $mce_css Passed by reference.
	 * @param  string $dir
	 * @param  string $uri
	 * @return void
	 */
	function t5_refill_editor_styles( &$mce_css, $dir, $uri )
	{
		global $editor_styles;
 
		foreach ( $editor_styles as $file )
		{
			if ( ! $file or ! file_exists( "$dir/$file" ) )
			{
				continue;
			}
 
			$mce_css[] = add_query_arg(
				'version',
				filemtime( "$dir/$file" ),
				"$uri/$file"
			);
		}
	}
}