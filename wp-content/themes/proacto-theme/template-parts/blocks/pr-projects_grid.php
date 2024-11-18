<?php
//main class name for block
$className = 'projects_grid_section';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$projects_grid = get_field('projects_grid');
$title = $projects_grid['title'];
$title = add_em_words($title, array(0));
$class_simple = $projects_grid['simplify_the_cards'] ? 'simplified' : '';

$category = !empty($projects_grid['category']) ? $projects_grid['category'] : false;


$number_posts = !empty($projects_grid['projects_per_page']) ? $projects_grid['projects_per_page'] : 12;

$args = array(
	'post_type'      => 'projects',
	'posts_per_page' => $number_posts,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
);

if ($category) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'projects_category', // Replace with your custom taxonomy (e.g., 'category' for default)
			'field'    => 'term_id',          // We are using term ID for filtering
			'terms'    => $category,          // The $category variable (term ID)
		),
	);
}

$projects_query = new WP_Query($args);

$block_options = get_field('block_options');
?>

<section class="<?= $className ?>">
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<?php if(!empty($title)): ?>
			<h2 class="heading heading-h2">
				<?= $title ?>
			</h2>
		<?php endif; ?>
		<?php if ($projects_query->have_posts()) : ?>
			<div class="projects_grid <?= $class_simple ?>" id="projects-section-container">
				<?php
				while ($projects_query->have_posts()) : $projects_query->the_post();
					get_project_card_template(get_post());
				endwhile;
                ?>
			</div>
            <button class="show-more" id="projects-section-more" data-per_page="<?= $number_posts ?>">
                <?= __('Show more', 'proacto') ?>
            </button>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php _e('No projects found.', 'proacto'); ?></p>
		<?php endif; ?>
	</div>
</section>
