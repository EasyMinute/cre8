<?php
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_66daf335b4ebc',
		'title' => 'Projects to buy',
		'fields' => array(
			array(
				'key' => 'field_66daf33596c7b',
				'label' => 'Projects to buy',
				'name' => 'projects_buy',
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
						'key' => 'field_66daf38796c7c',
						'label' => 'Title',
						'name' => 'title',
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
						'key' => 'field_66daf38f96c7d',
						'label' => 'Text',
						'name' => 'text',
						'aria-label' => '',
						'type' => 'textarea',
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
						'rows' => '',
						'placeholder' => '',
						'new_lines' => 'br',
					),
					array(
						'key' => 'field_66daf3a696c7e',
						'label' => 'Button',
						'name' => 'button',
						'aria-label' => '',
						'type' => 'link',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
					),
					array(
						'key' => 'field_66daf3b096c7f',
						'label' => 'Available projects',
						'name' => 'available_projects',
						'aria-label' => '',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'projects',
						),
						'post_status' => '',
						'taxonomy' => array(
							0 => 'availibility:available',
						),
						'filters' => array(
							0 => 'search',
							1 => 'post_type',
							2 => 'taxonomy',
						),
						'return_format' => 'object',
						'min' => '',
						'max' => '',
						'elements' => '',
						'bidirectional' => 0,
						'bidirectional_target' => array(
						),
					),
					array(
						'key' => 'field_66daf4a61beeb',
						'label' => 'Sold projects',
						'name' => 'sold_projects',
						'aria-label' => '',
						'type' => 'relationship',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'post_type' => array(
							0 => 'projects',
						),
						'post_status' => '',
						'taxonomy' => array(
							0 => 'availibility:sold',
						),
						'filters' => array(
							0 => 'search',
							1 => 'post_type',
							2 => 'taxonomy',
						),
						'return_format' => 'object',
						'min' => '',
						'max' => '',
						'elements' => '',
						'bidirectional' => 0,
						'bidirectional_target' => array(
						),
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/projects-buy-block',
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

