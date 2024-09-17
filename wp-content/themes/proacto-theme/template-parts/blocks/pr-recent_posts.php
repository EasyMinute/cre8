<?php
//main class name for block
$className = 'recent_posts';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$recent_posts = get_field('recent_posts');
$title = !empty($recent_posts['title']) ? $recent_posts['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(3,4));
if($recent_posts['chose_posts'] && !empty($recent_posts['posts'])) {
	$posts = $recent_posts['posts'];
} else {
	$posts = get_posts(array(
		'numberposts' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
		'post_type' => 'post',
	));
}
?>

<section class="<?php echo  esc_attr($className)?>" >
	<div class="container">
		<h2 class="heading heading-h2">
			<?= $title ?>
		</h2>
		<?php if ($posts): ?>
			<div class="recent_posts__wrap">
				<?php foreach ($posts as $post): ?>
					<?php
                    setup_postdata($post);
                    $title = get_the_title($post);
                    $link = get_the_permalink($post);
                    $image_url = esc_url(get_the_post_thumbnail_url($post));
                    $image_alt = esc_attr(get_the_post_thumbnail_caption($post));
                    $excerpt = get_the_excerpt($post);
					$author_id = get_the_author_meta('ID');
                    $author = get_the_author_meta('display_name', $author_id);
					$author_options = get_field('user_options', 'user_' . $author_id);
                    $author_image = esc_url($author_options['user_photo']['url']);
					$date = get_the_date('d M Y', $post);
                    $cats = get_the_category($post);
					?>
					<div class="post-card">
                        <div class="post-card__thumbnail">
                            <img src="<?= $image_url ?>" alt="<?= $image_alt ?>">
                        </div>
                        <?php if($cats): ?>
                            <div class="post-card__cats">
                                <?php foreach ($cats as $cat): ?>
                                    <span class="body body-14">
                                        <?= $cat->name ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="heading heading-h3 post-card__title">
                            <?= $title ?>
                        </h3>
                        <p class="body post-card__text">
                            <?= $excerpt ?>
                        </p>
                        <div class="post-card__meta">
                            <img src="<?= $author_image ?>" alt="" class="author-photo">
                            <p class="body body-14 author_date">
                                <?= $author ?>

                                <span class="date">
                                    <?= $date ?>
                                </span>
                            </p>
                        </div>
                        <a href="<?= $link ?>" class="link-overlay"></a>
					</div>
				<?php endforeach; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
	</div>
</section>
