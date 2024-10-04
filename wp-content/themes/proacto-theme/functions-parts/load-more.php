<?php
function proacto_load_more_projects() {
    $paged = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : 1;
    $posts_per_page = isset($_POST['posts_per_page']) ? sanitize_text_field($_POST['posts_per_page']) : 12;

    $args = array(
        'post_type'      => 'projects',       // Replace with your CPT slug
        'posts_per_page' => $posts_per_page,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish',
    );

    $projects_query = new WP_Query($args);


    if ($projects_query->have_posts()) :
        while ($projects_query->have_posts()) : $projects_query->the_post();

            get_project_card_template(get_post()); // Use the same template for the card
        endwhile;
    endif;

    wp_reset_postdata();
    die(); // End the AJAX request
}

add_action('wp_ajax_load_more_projects', 'proacto_load_more_projects'); // For logged in users
add_action('wp_ajax_nopriv_load_more_projects', 'proacto_load_more_projects'); // For guests

function load_more_projects() {
	$paged = isset($_POST['paged']) ? $_POST['paged'] : 1;
	$term_slug = isset($_POST['term_slug']) ? sanitize_text_field($_POST['term_slug']) : '';

	$args = [
		'post_type' => 'projects',
		'posts_per_page' => 12,
		'paged' => $paged,
	];

	if ($term_slug) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'technology',
				'field'    => 'slug',
				'terms'    => $term_slug,
			]
		];
	}

	$query = new WP_Query($args);

	if ($query->have_posts()) {
		while ($query->have_posts()) : $query->the_post(); ?>
			<?php
			$thumb_url = get_the_post_thumbnail_url();
			$thumb_alt = get_the_post_thumbnail_caption();
			$link = get_the_permalink();
			?>

			<div class="projects_masonry__card">
				<img src="<?= esc_url($thumb_url) ?>" alt="<?= esc_attr($thumb_alt) ?>">
				<a href="<?= $link ?>" class="link-overlay"></a>
			</div>
		<?php endwhile;
		// Check if there are more pages
		if ($paged >= $query->max_num_pages) {
			$response['status'] = 'no_more';
		}

	} else {
		$response['status'] = 'no_more';
	}

	wp_reset_postdata();
	wp_send_json($response);
	die();
}

// Register AJAX handlers
add_action('wp_ajax_load_more_projects_masonry', 'load_more_projects');
add_action('wp_ajax_nopriv_load_more_projects_masonry', 'load_more_projects');

?>
