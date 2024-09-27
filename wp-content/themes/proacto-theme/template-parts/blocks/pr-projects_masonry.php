<?php
//main class name for block
$className = 'projects_masonry';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$projects_masonry = get_field('projects_masonry');

// Get the taxonomy terms (technology)
$terms = get_terms(['taxonomy' => 'technology', 'hide_empty' => true]);


$technology_filter = isset($_GET['technology']) ? sanitize_text_field($_GET['technology']) : '';
// Initial query to load the first 12 projects
$args = [
	'post_type'      => 'projects',
	'posts_per_page' => 12,
	'paged'          => 1,
	'order'          => 'DESC',
	'orderby'        => 'date'
];
// If a filter is applied, modify the query to filter by the selected term
if ($technology_filter) {
	$args['tax_query'] = [
		[
			'taxonomy' => 'technology',
			'field'    => 'slug',
			'terms'    => $technology_filter,
		]
	];
}
$initial_query = new WP_Query($args);

?>

<section class="<?= $className ?>">
	<div class="container">
		<div class="projects_masonry__filter">

            <div class="projects_masonry__filter__wrap">

                <a href="." class="filter-button <?= isset($_GET['technology']) ? '' : 'active' ?>" >
                    <?=  __('All projects', 'proacto') ?>
                </a>

                <?php foreach ($terms as $term) : ?>
                    <?php
                    $current_filter = isset($_GET['technology']) ? $_GET['technology'] : '';
                    $active_class = ($current_filter == $term->slug) ? 'active' : '';
                    $term_options = get_field('technology_options', 'technology_' . $term->term_id);
                    $term_icon_url = esc_url($term_options['icon']['url']);
                    $term_icon_alt = esc_attr($term_options['icon']['alt']);
                    ?>

                    <a href="?technology=<?= esc_attr($term->slug)?>" class="filter-button <?= esc_attr($active_class) ?>">
                        <img src="<?= $term_icon_url ?>" alt="<?= $term_icon_alt ?>">
                        <span><?= esc_html($term->name) ?></span>
                    </a>

                <?php endforeach; ?>

            </div>
		</div>

		<div class="projects_masonry__grid">
			<?php if ($initial_query->have_posts()) : ?>
				<?php while ($initial_query->have_posts()) : $initial_query->the_post(); ?>
					<?php
					$thumb_url = get_the_post_thumbnail_url();
					$thumb_alt = get_the_post_thumbnail_caption();
					$link = get_the_permalink();
					?>

					<div class="projects_masonry__card">
						<img src="<?= esc_url($thumb_url) ?>" alt="<?= esc_attr($thumb_alt) ?>">
						<a href="<?= $link ?>" class="link-overlay"></a>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata();?>
		</div>

        <?php if ($initial_query->max_num_pages > 1) : ?>
            <button id="load-more-masonry" class="show-more dark" data-current-page="1" data-term="<?php echo esc_attr($technology_filter); ?>">
                <?= __('Show more', 'proacto') ?>
            </button>
        <?php endif; ?>

	</div>
</section>
