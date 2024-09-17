<?php
//main class name for block
$className = 'pay_projects_grid';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$pay_projects_grid = get_field('pay_projects_grid');
$title = !empty($pay_projects_grid['title']) ? $pay_projects_grid['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(1));

$availibility = !empty($pay_projects_grid['availibilty']) ? $pay_projects_grid['availibilty'] : false;



$number_posts = !empty($pay_projects_grid['projects_per_page']) ? $pay_projects_grid['projects_per_page'] : 12;

$args = array(
	'post_type'      => 'projects',
	'posts_per_page' => $number_posts,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
);

if ($availibility) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'availibility', // Replace with your custom taxonomy (e.g., 'availibility' for default)
			'field'    => 'term_id',          // We are using term ID for filtering
			'terms'    => $availibility->term_id,          // The $availibility variable (term ID)
		),
	);
}

$projects_query = new WP_Query($args);
?>

<section class="<?= $className ?>">
	<div class="container">
		<h2 class="heading heading-h2 section_title">
			<?= $title ?>
		</h2>
		<?php if ($projects_query->have_posts()) : ?>
			<div class="projects_buy__grid active">
				<?php while ($projects_query->have_posts()) : $projects_query->the_post(); ?>
					<?php
					$post = get_post();
					setup_postdata($post);
					$title = get_the_title($post);
					$img_url = get_the_post_thumbnail_url($post);
					$img_alt = get_the_post_thumbnail_caption($post);
					$link = get_the_permalink($post);
					$terms = get_the_terms($post->ID, 'technology');
					if ($terms) {
						$term_name = $terms[0]->name;
					} else {
						$term_name = __('Project', 'proacto');
					}
					?>

					<?php if($availibility->slug == 'available') : ?>
						<div class="projects_buy-card">
							<div class="projects_buy-card__img">
								<img src="<?= $img_url ?>" alt="<?= $img_alt ?>">
							</div>
							<div class="projects_buy-card__texts">
								<h3 class="heading heading-h3 title">
									<?= $title ?>
								</h3>
								<span class="body technology">
		                                <?= $term_name ?>
		                            </span>
							</div>
							<a href="#" class="button-pay"></a>
							<a href="<?= $link ?>" class="arrow-button tertiary"></a>
						</div>
					<?php elseif ($availibility->slug == 'sold'): ?>
						<div class="projects_buy-card sold">
							<div class="projects_buy-card__img">
								<img src="<?= $img_url ?>" alt="<?= $img_alt ?>">
								<span class="body"><?= __('Sold', 'proacto') ?></span>
							</div>
							<div class="projects_buy-card__texts">
								<h3 class="heading heading-h3 title">
									<?= $title ?>
								</h3>
								<span class="body technology">
                                <?= $term_name ?>
                            </span>
							</div>
							<a href="<?= $link ?>" class="arrow-button tertiary"></a>
						</div>
					<?php endif; ?>

				<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<?php endif; ?>
	</div>
</section>
