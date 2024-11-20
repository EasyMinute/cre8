<?php
//main class name for block
$className = 'projects_masonry';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$projects_masonry = get_field('projects_masonry');
$title = $projects_masonry['title'] ?? __('Our 2D art Portfolio');
$title = add_em_words($title, array(0));
$text = $projects_masonry['text'] ?? '';

// Get the taxonomy terms (technology)
$terms = get_terms([
    'taxonomy' => 'media_category',
    'hide_empty' => false,
    'orderby' => 'slug',
    'order' => 'ASC',
]);


$technology_filter = isset($_GET['technology']) ? sanitize_text_field($_GET['technology']) : 'all';

// Initial query to load the first 12 projects
$args = [
	'post_type'      => 'attachment',
	'posts_per_page' => 12,
	'post_status'    => 'inherit',    // Attachments typically have 'inherit' status
	'post_mime_type' => 'image',      // Fetch only image files
	'paged'          => 1,
//	'order'          => 'DESC',
//	'orderby'        => 'date'
];
// If a filter is applied, modify the query to filter by the selected term
if ($technology_filter) {
	$args['tax_query'] = [
		[
			'taxonomy' => 'media_category',
			'field'    => 'slug',
			'terms'    => $technology_filter,
		]
	];
}
$initial_query = new WP_Query($args);
$block_options = get_field('block_options');


?>

<section class="<?= $className ?>">
    <?php add_decorative_line($block_options) ?>
	<div class="container">
        <div class="projects_masonry__head">
            <h2 class="heading heading-h2 section_title">
                <?= $title ?>
            </h2>
            <?php if (!empty($text)): ?>
                <p class="body section_text">
                    <?= $text ?>
                </p>
            <?php endif; ?>
        </div>
		<div class="projects_masonry__filter">

            <div class="projects_masonry__filter__wrap">

                <?php foreach ($terms as $term) : ?>
                    <?php
                    $current_filter = isset($_GET['technology']) ? $_GET['technology'] : 'all';
                    $active_class = ($current_filter == $term->slug) ? 'active' : '';
                    ?>

                    <a href="#<?= esc_attr($term->slug)?>" class="filter-button <?= esc_attr($active_class) ?>">
                        <span><?= esc_html($term->name) ?></span>
                    </a>

                <?php endforeach; ?>

            </div>
		</div>

		<div class="projects_masonry__grid" id="projects_masonry__grid">
			<?php if ($initial_query->have_posts()) : ?>
				<?php while ($initial_query->have_posts()) : $initial_query->the_post(); ?>
					<?php
					$thumb_url = get_the_post_thumbnail_url();
					$thumb_alt = get_the_post_thumbnail_caption();
					$link = get_the_permalink();
					?>

					<a class="projects_masonry__card" href="<?= esc_url($link) ?>">
						<img src="<?= esc_url($link) ?>" alt="<?= esc_attr($thumb_alt) ?>">
					</a>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata();?>
		</div>

        <?php if($initial_query->max_num_pages > 1): ?>
            <button id="load-more-masonry" class="show-more dark" data-current-page="1" data-term="<?php echo esc_attr($technology_filter); ?>">
                <?= __('Show more', 'proacto') ?>
            </button>
        <?php endif; ?>

	</div>
</section>
