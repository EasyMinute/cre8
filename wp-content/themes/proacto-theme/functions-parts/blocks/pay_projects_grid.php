<?php
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key' => 'group_66e414329ab00',
		'title' => 'Pay projects grid',
		'fields' => array(
			array(
				'key' => 'field_66e4143252778',
				'label' => 'Pay projects grid',
				'name' => 'pay_projects_grid',
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
						'key' => 'field_66e4144252779',
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
						'key' => 'field_66e4144c5277a',
						'label' => 'Posts per page',
						'name' => 'posts_per_page',
						'aria-label' => '',
						'type' => 'number',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'min' => '',
						'max' => '',
						'placeholder' => '',
						'step' => '',
						'prepend' => '',
						'append' => '',
					),
					array(
						'key' => 'field_66e414585277b',
						'label' => 'Availibilty',
						'name' => 'availibilty',
						'aria-label' => '',
						'type' => 'taxonomy',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'taxonomy' => 'availibility',
						'add_term' => 0,
						'save_terms' => 0,
						'load_terms' => 0,
						'return_format' => 'object',
						'field_type' => 'select',
						'allow_null' => 0,
						'bidirectional' => 0,
						'multiple' => 0,
						'bidirectional_target' => array(
						),
					),
					array(
						'key' => 'field_66e414fc9b6c3',
						'label' => 'Projects will load automatically',
						'name' => '',
						'aria-label' => '',
						'type' => 'message',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'new_lines' => 'wpautop',
						'esc_html' => 0,
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/pay-projects-grid-block',
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
