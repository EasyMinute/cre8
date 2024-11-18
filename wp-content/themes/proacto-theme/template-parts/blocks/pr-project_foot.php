<?php
//main class name for block
$className = 'project_foot';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$project_foot = get_field('project_foot');

$title = $project_foot['projects_title'];
$title = add_em_words($title, array(1));
$class_simple = 'simplified';
$number_posts = 3;

$args = array(
	'post_type'      => 'projects',
	'posts_per_page' => $number_posts,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
);

$projects_query = new WP_Query($args);

$block_options = get_field('block_options');
?>

<section class="<?= $className ?> is-style-image">
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<div class="project_foot__head">
			<h2 class="heading-h2 heading section-title">
				<?= $title ?>
			</h2>
			<a href="<?= $project_foot['button']['url'] ?>" class="button">
				<?= $project_foot['button']['title'] ?>
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 10.5L8 15.5L8 5.5L13 10.5Z" fill="#093238"/>
                </svg>
            </a>
		</div>
		<div class="projects_grid <?= $class_simple ?>" id="projects-section-container">
			<?php
			while ($projects_query->have_posts()) : $projects_query->the_post();

                $post = get_post(get_the_ID());
                $title   = get_the_title( $post );
                $img_url = get_the_post_thumbnail_url( $post );
                $img_alt = get_the_post_thumbnail_caption( $post );
                $link    = get_the_permalink( $post );
                $terms   = get_the_terms( $post->ID, 'technology' );
                if ( $terms ) {
                    $term_name = $terms[0]->name;
                } else {
                    $term_name = __( 'Project', 'proacto' );
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

			<?php endwhile;
			?>
		</div>
	</div>
</section>