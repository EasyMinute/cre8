<?php
/**
 * This file is used to register ACF Gutenberg blocks
 *
 * @package Proacto
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * This class customizes and configures the plugin ACF
 */
class Acf_Config {

    /**
     * Constructor
     */
    public function __construct() {

        $this->int_add_option_pages();
        add_action( 'acf/init', array( $this, 'pr_register_acf_gutenberg_block_types' ), 10 );
        add_filter( 'block_categories_all', array( $this, 'pr_add_custom_block_category' ), 10, 2 );

    }
    protected function int_add_option_pages() {

        if( function_exists('acf_add_options_page') ) {

            acf_add_options_page(array(
                'page_title' 	=> 'Theme General Settings',
                'menu_title'	=> 'Theme settings',
                'menu_slug' 	=> 'theme-general-settings',
                'capability'	=> 'edit_posts',
                'redirect'		=> false
            ));

            acf_add_options_sub_page(array(
                'page_title' 	=> 'Theme Header Settings',
                'menu_title'	=> 'Header',
                'parent_slug'	=> 'theme-general-settings',
            ));

            acf_add_options_sub_page(array(
                'page_title' 	=> 'Theme Footer Settings',
                'menu_title'	=> 'Footer',
                'parent_slug'	=> 'theme-general-settings',
            ));

        }

    }

    /**
     * Register acf blocks for Gutenberg editor
     *
     * @return void
     */
    public function pr_register_acf_gutenberg_block_types() {
        //Set block names comma separated
	    $blocks = array(
			array(
				'name' => 'baner',
				'title' => __('Baner', 'proacto'),
				'description' => __('Main page baner', 'proacto'),
				'icon' => 'cover-image'
			),
		    array(
			    'name' => 'services_projects',
			    'title' => __('Services & Projects', 'proacto'),
			    'description' => __('Main page services & projects', 'proacto'),
			    'icon' => 'excerpt-view'
		    ),
		    array(
			    'name' => 'projects_buy',
			    'title' => __('Projects to buy', 'proacto'),
			    'description' => __('Grid of buyable projects', 'proacto'),
			    'icon' => 'screenoptions'
		    ),
		    array(
			    'name' => 'info_numbers',
			    'title' => __('Info numbers', 'proacto'),
			    'description' => __('Text with info numbers', 'proacto'),
			    'icon' => 'editor-ol'
		    ),
		    array(
			    'name' => 'icons_slider',
			    'title' => __('Icons slider', 'proacto'),
			    'description' => __('Icons slider with links', 'proacto'),
			    'icon' => 'ellipsis'
		    ),
		    array(
			    'name' => 'portfolio',
			    'title' => __('Portfolio', 'proacto'),
			    'description' => __('Portfolio', 'proacto'),
			    'icon' => 'portfolio'
		    ),
		    array(
			    'name' => 'benefits_grid',
			    'title' => __('Benefits grid', 'proacto'),
			    'description' => __('Benefits grid', 'proacto'),
			    'icon' => 'screenoptions'
		    ),
		    array(
			    'name' => 'testimonials_slider',
			    'title' => __('Testimonials slider', 'proacto'),
			    'description' => __('Slider with testimonials', 'proacto'),
			    'icon' => 'slides'
		    ),
		    array(
			    'name' => 'recent_posts',
			    'title' => __('Recent posts', 'proacto'),
			    'description' => __('3 posts', 'proacto'),
			    'icon' => 'sticky'
		    ),
		    array(
			    'name' => 'contact_form',
			    'title' => __('Contact form', 'proacto'),
			    'description' => __('Block with form', 'proacto'),
			    'icon' => 'email-alt'
		    ),
		    array(
			    'name' => 'text_block',
			    'title' => __('Text block', 'proacto'),
			    'description' => __('Block with text', 'proacto'),
			    'icon' => 'text-page'
		    ),
		    array(
			    'name' => 'small_baner',
			    'title' => __('Small baner', 'proacto'),
			    'description' => __('Block with text', 'proacto'),
			    'icon' => 'nametag'
		    ),
		    array(
			    'name' => 'projects_grid',
			    'title' => __('Projects grid', 'proacto'),
			    'description' => __('Grid with all projects', 'proacto'),
			    'icon' => 'grid-view'
		    ),
		    array(
			    'name' => 'image_values',
			    'title' => __('Image & values', 'proacto'),
			    'description' => __('Grid with all projects', 'proacto'),
			    'icon' => 'align-pull-left'
		    ),
		    array(
			    'name' => 'pay_projects_grid',
			    'title' => __('Pay projects grid', 'proacto'),
			    'description' => __('Grid with all choose paying projects', 'proacto'),
			    'icon' => 'grid-view'
		    ),
		    array(
			    'name' => 'steps',
			    'title' => __('Steps', 'proacto'),
			    'description' => __('1,2,3 and so on', 'proacto'),
			    'icon' => 'ellipsis'
		    ),
		    array(
			    'name' => 'projects_masonry',
			    'title' => __('Projects masonry', 'proacto'),
			    'description' => __('Masonry of projects with filter and show more', 'proacto'),
			    'icon' => 'tagcloud'
		    ),
		    array(
			    'name' => 'photo_gallery',
			    'title' => __('Photo gallery', 'proacto'),
			    'description' => __('Gallery of photos', 'proacto'),
			    'icon' => 'tagcloud'
		    ),
		    array(
			    'name' => 'list_cards',
			    'title' => __('List cards', 'proacto'),
			    'description' => __('Fancy cards with lists', 'proacto'),
			    'icon' => 'index-card'
		    ),
		    array(
			    'name' => 'full_image',
			    'title' => __('Full image', 'proacto'),
			    'description' => __('Image on full width', 'proacto'),
			    'icon' => 'format-image'
		    ),
		    array(
			    'name' => 'project_foot',
			    'title' => __('Project foot', 'proacto'),
			    'description' => __('Form and recent projects', 'proacto'),
			    'icon' => 'block-default'
		    ),
		    array(
			    'name' => 'portfolio_sections',
			    'title' => __('Portfolio sections', 'proacto'),
			    'description' => __('Sections of portfolio categories', 'proacto'),
			    'icon' => 'nametag'
		    ),
		    array(
			    'name' => 'faq',
			    'title' => __('FAQ', 'proacto'),
			    'description' => __('Frequently asked questions', 'proacto'),
			    'icon' => 'editor-help'
		    ),
		    array(
			    'name' => 'icons_list',
			    'title' => __('List with icons', 'proacto'),
			    'description' => __('List with icons', 'proacto'),
			    'icon' => 'editor-ul'
		    ),
		    array(
			    'name' => 'video',
			    'title' => __('Video section', 'proacto'),
			    'description' => __('Title, text and video', 'proacto'),
			    'icon' => 'format-video'
		    ),

	    );
	    $acf_style_names = array(
		    array(
			    'name' => 'darked',
			    'label' => __("Dark background", 'proacto')
		    ),
	    );

        if ( function_exists( 'acf_register_block_type' ) ) {

            foreach ( $blocks as $block ) {
                acf_register_block_type(
                    array(
                        'name'            => $block['name'] . '-block',
                        'title'           => $block['title'] . ' | ' . __( ' Proacto', 'proacto' ),
                        'description'     => $block['description'] . __( ' : ACF block for Gutenberg Editor', 'proacto' ),
                        'render_template' => 'template-parts/blocks/pr-' . $block['name'] . '.php',
                        'category'        => 'proacto-custom-blocks',
                        'icon'            => $block['icon'],
                        'mode'            => 'edit',
                        'supports'        => array(
                            'mode' => false,
                        ),
                    )
                );
            }
        }

	    register_block_style(
		    'core/group',
		    array(
			    'name'  => 'image',
			    'label' => __('Image on bg')
		    )
	    );
    }

    /**
     * Add custom block category
     */
    public function pr_add_custom_block_category( $categories, $post ) {
        $desired_position = 0;
        $pr_category = array(
            'slug'  => 'proacto-custom-blocks',
            'title' => 'Proacto Blocks',
            'icon'  => 'block-default',
        );

        array_splice( $categories, $desired_position, 0, array( $pr_category ) );

        return $categories;
    }
}

if ( class_exists( 'Acf_Config' ) ) {

    new Acf_Config();
}



add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_66f4085bd2cc1',
		'title' => 'Post options',
		'fields' => array(
			array(
				'key' => 'field_66f4085ce0ffe',
				'label' => 'Post options',
				'name' => 'post_options',
				'aria-label' => '',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'block',
				'sub_fields' => array(
					array(
						'key' => 'field_66f40886e0fff',
						'label' => 'Author',
						'name' => 'author',
						'aria-label' => '',
						'type' => 'group',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'layout' => 'table',
						'sub_fields' => array(
							array(
								'key' => 'field_66f40a49e1000',
								'label' => 'Name',
								'name' => 'name',
								'aria-label' => '',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'maxlength' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
							),
							array(
								'key' => 'field_66f40a4fe1001',
								'label' => 'Photo',
								'name' => 'photo',
								'aria-label' => '',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'array',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
								'preview_size' => 'thumbnail',
							),
						),
					),
					array(
						'key' => 'field_66f40a62e1002',
						'label' => 'Baner desktop',
						'name' => 'baner_desktop',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '1440x420',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium_large',
					),
					array(
						'key' => 'field_66f40abde1003',
						'label' => 'Baner mobile',
						'name' => 'baner_mobile',
						'aria-label' => '',
						'type' => 'image',
						'instructions' => '360x579',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '50',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
						'preview_size' => 'medium_large',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	) );
} );

