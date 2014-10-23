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

//-- For examples, see examples/metaboxes.php

/**
 * Create Metaboxes
 * @author Joe Alberts <jra@umich.edu>
 * @since 1.0.1
 * @cpt People
 */

function cmb_people_metaboxes( array $meta_boxes ) {

        $prefix = '_prc_people-';

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
                'pages' => 'people',
                'fields' => $bio_fields
        );

return $meta_boxes;

}
add_filter( 'cmb_meta_boxes', 'cmb_people_metaboxes' );
