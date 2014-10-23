<?php
/**
 * Metaboxes
 *
 * This file registers any custom metaboxes
 *
 * @package      Core_Functionality
 * @since        1.0.1
 * @link         https://github.com/jalberts/Core-Functionality
 * @author       Joe Alberts <jra@umich.edu>
 * @copyright    Copyright (c) 2013, Joe Alberts
 * @license      GPL2 http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

/**
 * Create Metaboxes
 * @since 0.1.0
 * @author Joe Alberts <jra@umich.edu>
 * @cpt Programs
 */

// Example metabox 
function cmb_programs_metaboxes( array $meta_boxes ) {

        $prefix = '_cmcd_program-';
        
        // Program Basic Info fields
        $info_fields = array(
			array(
				'id' => $prefix . 'short-description',
				'name' => 'Short Description',
				'desc' => 'Used when listing multiple programs',
				'type' => 'wysiwyg',
				'cols' => 8,
				'options' =>
						array(
								'textarea_rows' => 8,
								'teeny' => true,
								'media_buttons' => false,
								'tinymce' => array(
									'theme_advanced_buttons1' => '|,bold,italic,underline,|,undo,redo,|,link,unlink,|,fullscreen,|',
								)
						),
			),
			array(
				'id' => $prefix . 'image',
				'name' => 'Program Image/Logo',
				'desc' => '<div style="margin-bottom: 50px;">125px x 80px; shown here at 2x</div>',
				'type' => 'image',
				'size' => 'height=160&width=250&crop=1',
				'show_size' => true,
				'cols' => 4,
			),
			array(
				'id' => $prefix . 'principal-investigator',
				'name' => 'Principal Investigator(s)',
				'type' => 'post_select',
				'allow_none' => true,
				'repeatable' => true,
				'use_ajax' => true,
				'query' => 
					array(
						'post_type' => 'directory',
						'orderby' => 'title',
						'order' => 'asc',
					),
				'cols' => 6,
			),
			array(
				'id' => $prefix . 'manager',
				'name' => 'Program Manager',
				'type' => 'post_select',
				'allow_none' => true,
				'repeatable' => true,
				'use_ajax' => true,
				'query' => 
					array(
						'post_type' => 'directory',
						'orderby' => 'title',
						'order' => 'asc',
					),
				'cols' => 6,
			),
			array(
				'id' => $prefix . 'other-roles',
				'name' => 'Additional Staff & Roles',
				'type' => 'group',
				'repeatable' => true,
				'cols' => 12,
				'fields' => array(
					array(
						'id' => $prefix . 'other-roles-person',
						'name' => 'Person',
						'type' => 'post_select',
						'allow_none' => true,
						'use_ajax' => true,
						'query' => 
							array(
								'post_type' => 'directory',
								'orderby' => 'title',
								'order' => 'asc',
							),
						'cols' => 6,
					),
					array(
						'id' => $prefix . 'other-roles-role',
						'name' => 'Role',
						'type' => 'text',
						'cols' => 6,
					),
				),
			),
			array(
				'id' => $prefix . 'dates',
				'name' => 'Program Dates',
				'type' => 'text_small',
				'repeatable' => true,
				'cols' => 6,
			),
			array(
				'id' => $prefix . 'website',
				'name' => 'Website',
				'type' => 'text_url',
				'cols' => 6,
			),
			array(
				'id' => $prefix . 'partners',
				'name' => 'Partners',
				'type' => 'group',
				'repeatable' => true,
				'cols' => 12,
				'fields' => array(
					array(
						'id' => $prefix . 'partner-name',
						'name' => 'Name or organization',
						'type' => 'text',
						'cols' => 6,
					),
					array(
						'id' => $prefix . 'partner-url',
						'name' => 'Website',
						'type' => 'text_url',
						'cols' => 6,
					),
				),
			),
			array(
				'id' => $prefix . 'funding-source',
				'name' => 'Funding Source(s)',
				'type' => 'group',
				'repeatable' => true,
				'cols' => 12,
				'fields' => array(
					array(
						'id' => $prefix . 'funding-source-name',
						'name' => 'Name or organization',
						'type' => 'text',
						'cols' => 6,
					),
					array(
						'id' => $prefix . 'funding-source-url',
						'name' => 'Website',
						'type' => 'text_url',
						'cols' => 6,
					),
				),
			),
		);

        // Metabox declaration
        $meta_boxes[] = array(
                'title' => 'Basic Info',
                'pages' => 'programs',
                'fields' => $info_fields,
        );
		
		// Program Detail fields
        $detail_fields = array(
			array(
				'id' => $prefix . 'full-description',
				'name' => 'Full Description',
				'desc' => 'Used on full program page',
				'type' => 'wysiwyg',
				'options' => array(
					'textarea_rows' => 15,
				),
			),
			array(
				'id' => $prefix . 'publications',
				'name' => 'Publications',
				'desc' => 'Separate sections with h3 titles (e.g., posters)',
				'type' => 'wysiwyg',
				'options' => array(
					'teeny' => true,
					'media_buttons' => false,
					'textarea_rows' => 5,
					'tinymce' => array(
						'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,blockquote,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,undo,redo,|,link,unlink,|,fullscreen,|',
					),
				),
			),
		);
		
		// Metabox declaration
        $meta_boxes[] = array(
                'title' => 'Detailed Info',
                'pages' => 'programs',
                'fields' => $detail_fields,
        );
		
		return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'cmb_programs_metaboxes' );

/**
 * Create Metaboxes
 * @author Joe Alberts <jra@umich.edu>
 * @since 0.1.0
 * @cpt Directory
 */

function cmb_directory_metaboxes( array $meta_boxes ) {

        $prefix = '_cmcd_directory-';

// Personal (Bio) Info fields
        $bio_fields = array(
                array(
                        'id' => $prefix . 'pic',
                        'name' => 'Picture',
                        'type' => 'image',
                        'cols' => 3
                ),
                array(
                        'id' => $prefix . 'title',
                        'name' => 'Title(s)',
                        'type' => 'text',
                        'repeatable' => true,
                        'cols' => 9
                        ),
                array(
                        'id' => $prefix . 'link',
                        'name' => 'Bio Link',
                        'type' => 'text_url',
                        'cols' => 3
                ),
                array(
                        'id' => $prefix . 'email',
                        'name' => 'Email',
                        'type' => 'text',
                        'cols' => 3
                ),
                array(
                        'id' => $prefix . 'phone',
                        'name' => 'Phone',
                        'type' => 'text',
                        'cols' => 3
                ),
                array(
                        'id' => $prefix . 'office',
                        'name' => 'Office #',
                        'type' => 'text_small',
                        'cols' => 3
                ),
				array(
					'id' => $prefix . 'about',
					'name' => 'About',
					'desc' => 'Extra detail about the individual',
					'type' => 'wysiwyg',
					'options' => array(
						'teeny' => true,
						'media_buttons' => false,
						'textarea_rows' => 5,
						'tinymce' => array(
							'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,blockquote,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,undo,redo,|,link,unlink,|,fullscreen,|',
						),
					),
				),
        );

        // Metabox declaration
        $meta_boxes[] = array(
                'title' => 'Personal Info',
                'pages' => 'directory',
                'fields' => $bio_fields
        );

return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'cmb_directory_metaboxes' );

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
