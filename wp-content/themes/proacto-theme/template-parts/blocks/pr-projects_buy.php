<?php
//main class name for block
$className = 'projects_buy';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$projects_buy = get_field('projects_buy');

if (!empty($projects_buy['available_projects'])) {
	$available_projects = $projects_buy['available_projects'];
} else {
	$available_projects = get_posts(array(
		'post_type'      => 'projects', // Custom post type
		'posts_per_page' => 6,          // Number of posts to retrieve
		'tax_query'      => array(
			array(
				'taxonomy' => 'availability',   // The taxonomy name
				'field'    => 'slug',           // Use slug to match the term
				'terms'    => 'available',      // The term slug to filter by
			),
		),
	));
}

if (!empty($projects_buy['sold_projects'])) {
	$sold_projects = $projects_buy['sold_projects'];
} else {
	$sold_projects = get_posts(array(
		'post_type'      => 'projects', // Custom post type
		'posts_per_page' => 6,          // Number of posts to retrieve
		'tax_query'      => array(
			array(
				'taxonomy' => 'availability',   // The taxonomy name
				'field'    => 'slug',           // Use slug to match the term
				'terms'    => 'sold',      // The term slug to filter by
			),
		),
	));
}

$block_options = get_field('block_options');
?>

<section class="<?php echo  esc_attr($className)?>">
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<div class="projects_buy__head">
            <div class="projects_buy__texts">
                <h2 class="title heading heading-h2">
                    <?= add_em_words($projects_buy['title'], array(1,2)) ?>
                </h2>
                <p class="body">
                    <?= $projects_buy['text'] ?>
                </p>
            </div>
            <button class="button medium button-switcher active tabber" data-on="available-projects" data-all="projects_buy__grid">
                <?= __('Available', 'proacto') ?>
            </button>
            <button class="button medium button-switcher tabber" data-on="sold-projects" data-all="projects_buy__grid">
                <?= __('Sold', 'proacto') ?>
            </button>
        </div>
        <div class="projects_buy__main">
            <div class="projects_buy__main__decor left">
                <?php for ($i = 0; $i < count($available_projects); $i++): ?>
                    <div class="card-empty"></div>
                <?php endfor; ?>
            </div>
            <div class="projects_buy__main__decor center">
		        <?php for ($i = 0; $i < count($available_projects); $i++): ?>
                    <div class="card-empty"></div>
		        <?php endfor; ?>
            </div>
            <div class="projects_buy__grid active" id="available-projects">
                <?php foreach ($available_projects as $post) : ?>
	                <?php
	                setup_postdata($post);

	                // Check if the post has the 'available' term in the 'availability' taxonomy
	                $availability_terms = get_the_terms($post->ID, 'availibility');
	                $is_available = false;

	                if (is_array($availability_terms)) {
		                foreach ($availability_terms as $availability_term) {
			                if ($availability_term->slug === 'available') {
				                $is_available = true;
				                break;
			                }
		                }
	                }

	                // Skip the post if it does not have the 'available' term
	                if (!$is_available) {
		                continue;
	                }

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
                            <a href="<?= $link ?>" class="arrow-button primary"></a>
                        </div>
                        <a href="<?= $link ?>" class="link-overlay"></a>
                    </div>
                <?php endforeach ?>
	            <?php wp_reset_postdata(); ?>
            </div>
            <div class="projects_buy__grid" id="sold-projects">
		        <?php foreach ($sold_projects as $post) : ?>
			        <?php
			        setup_postdata($post);

			        $availability_terms = get_the_terms($post->ID, 'availibility');
			        $is_available = false;

			        if ($availability_terms) {
				        foreach ($availability_terms as $term) {
					        if ($term->slug === 'sold') {
						        $is_available = true;
						        break;
					        }
				        }
			        }

			        // Skip this post if it's not available
			        if (!$is_available) {
				        continue;
			        }

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
                    <div class="projects_buy-card sold">
                        <div class="projects_buy-card__img">
                            <img src="<?= $img_url ?>" alt="<?= $img_alt ?>">
                        </div>
                        <div class="projects_buy-card__texts">
                            <span class="body sold-label"><?= __('Sold', 'proacto') ?></span>
                            <h3 class="heading heading-h3 title">
						        <?= $title ?>
                            </h3>
                            <span class="body technology">
                                <?= $term_name ?>
                            </span>
                            <a href="<?= $link ?>" class="arrow-button tertiary"></a>
                        </div>
                        <a href="<?= $link ?>" class="link-overlay"></a>
                    </div>
		        <?php endforeach ?>
		        <?php wp_reset_postdata(); ?>
            </div>
	        <?php if(!empty($projects_buy['button'])): ?>
                <a href="<?= $projects_buy['button']['url'] ?>" class="show-more dark">
			        <?= $projects_buy['button']['title'] ?>
                </a>
	        <?php endif; ?>
            <div class="projects_buy__main__decor right">
	            <?php for ($i = 0; $i < count($available_projects); $i++): ?>
                    <div class="card-empty"></div>
                <?php endfor; ?>
            </div>
        </div>
	</div>
</section>
