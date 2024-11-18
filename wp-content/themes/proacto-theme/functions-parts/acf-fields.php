<?php
$block_files = [
	'baner',
	'services_projects',
	'projects_buy',
	'info_numbers',
	'icons_slider',
	'portfolio',
	'benefits_grid',
	'testimonials_slider',
	'recent_posts',
	'contact_form',
	'text_block',
	'small_baner',
	'projects_grid',
	'image_values',
	'pay_projects_grid',
	'steps',
	'projects_masonry',
	'photo_gallery',
	'list_cards',
	'full_image',
	'project_foot',
	'portfolio_sections',
	'faq',
	'video',

];

foreach ( $block_files as $block ) {
	require get_template_directory() . '/functions-parts/blocks/' . $block . '.php';
}
