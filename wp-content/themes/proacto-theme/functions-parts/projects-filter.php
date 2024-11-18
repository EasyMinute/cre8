<?php
function filter_projects_ajax() {
	// Get the selected technology from the AJAX request
	$technology = sanitize_text_field($_GET['technology']);
	$paged = isset($_GET['paged']) ? intval($_GET['paged']) : 1;

	// Prepare the query arguments
	$args = [
		'post_type'      => 'attachment',
		'post_status'    => 'inherit',    // Attachments typically have 'inherit' status
		'post_mime_type' => 'image',      // Fetch only image files
		'posts_per_page' => 12,
		'paged'          => $paged,
		'order'          => 'DESC',
		'orderby'        => 'date'
	];

	if ($technology) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'media_category',
				'field'    => 'slug',
				'terms'    => $technology,
			]
		];
	}

	$filtered_query = new WP_Query($args);

	if ($filtered_query->have_posts()) {
		while ($filtered_query->have_posts()) {
			$filtered_query->the_post();
			$thumb_url = wp_get_attachment_url(get_the_ID());
			// Get the attachment title
			$thumb_alt = get_the_title();
//			$thumb_url = get_the_post_thumbnail_url();
//			$thumb_alt = get_the_post_thumbnail_caption();
//			$link = get_the_permalink();
			?>
			<a class="projects_masonry__card" href="<?= esc_url($thumb_url) ?>">
				<img src="<?= esc_url($thumb_url) ?>" alt="<?= esc_attr($thumb_alt) ?>">
			</a>
			<?php
		}
		if ($paged >= $filtered_query->max_num_pages) {
			$response['status'] = 'no_more';
		} else {
			$response['status'] = 'more';
		}

	} else {
		$response['status'] = 'no_more';
	}

	wp_reset_postdata();
	wp_send_json($response);
	// Make sure the AJAX request stops here
	die();
}
add_action('wp_ajax_filter_projects', 'filter_projects_ajax');
add_action('wp_ajax_nopriv_filter_projects', 'filter_projects_ajax');
