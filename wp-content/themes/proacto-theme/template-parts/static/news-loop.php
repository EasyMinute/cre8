<?php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

// 2. Get the category filter from URL (if any)
$category_slug = isset($_GET['category']) ? sanitize_text_field( $_GET['category'] ) : '';

// 3. Set up arguments for the custom query
$args = array(
	'post_type'      => 'post',         // Fetch standard posts
	'posts_per_page' => 3,              // Number of posts per page
	'paged'          => $paged,         // Current page for pagination
	'orderby'        => 'date',         // Sort by date
	'order'          => 'DESC',         // Newest posts first
);

// 4. If category filter is set, add category to query args
if ( !empty($category_slug) ) {
	$args['category_name'] = $category_slug; // Filter by category slug
}

$all_categories = get_categories();

// 5. Execute the custom query
$custom_query = new WP_Query( $args );

$title = __('Latest posts', 'proacto');
$title = add_em_words($title, array(1));

$footer = get_field('footer_options', 'options');
?>

<section class="news_loop">
	<div class="container">
		<div class="news_loop__wrap">
			<div class="news_loop__wrap__main">
				<h2 class="heading-h2 heading section-title">
					<?=  $title ?>
				</h2>
				<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
					<?php
					$id = get_the_ID();
					$title = get_the_title();
					$categories = get_the_category();
					$excerpt = get_the_excerpt();
					$thumb_url = get_the_post_thumbnail_url();
					$thumb_alt = get_the_post_thumbnail_caption();
					$link = get_the_permalink();
					$date = get_the_date();
					$post_options = get_field('post_options', $id);
					if ($post_options) {
						$author = $post_options['author'];
					} else {
						$author = array('name'=>get_the_author());
					}
					$date = get_the_date('d M Y', $id);
					?>

					<article class="article-card">
						<img src="<?= esc_url( $thumb_url ) ?>" alt="<?= esc_attr( $thumb_alt ) ?>" class="article-card__img">
						<div class="article-card__texts">
							<?php if(!empty($categories)): ?>
								<ul class="post-categories">
									<?php foreach ($categories as $cat): ?>
										<li class="body"><?= $cat->name ?></li>
									<?php endforeach;  ?>
								</ul>
							<?php endif; ?>
							<h3 class="heading heading-h4 block-title">
								<?= $title ?>
							</h3>
							<p class="body block-text">
								<?= $excerpt ?>
							</p>
							<div class="post-meta">
								<?php if(isset($author['photo']['url'])): ?>
									<img src="<?= esc_url($author['photo']['url']) ?>" alt="<?= esc_attr($author['photo']['alt']) ?>" class="author-img">
								<?php endif; ?>
								<span class="body author-name">
									<?= $author['name'] ?>
								</span>
								<span class="body date">
									<?= $date ?>
								</span>
							</div>
						</div>
                        <a href="<?= $link ?>" class="link-overlay"></a>
					</article>

				<?php endwhile; ?>

                <!-- Pagination -->
                <div class="pagination">
					<?php
					echo paginate_links( array(
						'total'   => $custom_query->max_num_pages,
						'current' => $paged,
						'format'  => '?paged=%#%',  // Pagination format
						'prev_text' => '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.66016 1.41L3.08016 6L7.66016 10.59L6.25016 12L0.250156 6L6.25016 0L7.66016 1.41Z" fill="#093238"/>
</svg>
',
						'next_text' => '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.339844 1.41L4.91984 6L0.339844 10.59L1.74984 12L7.74984 6L1.74984 0L0.339844 1.41Z" fill="#093238"/>
</svg>',
					) );
					?>
                </div>
				<?php wp_reset_postdata(); ?>
			</div>

			<div class="news_loop__wrap__side">
                <h4 class="heading heading-h4 block-title">
                    <?= __('By Type', 'proacto') ?>
                </h4>
                <ul class="cats-list">
                    <?php foreach( $all_categories as $cat ) : ?>
                        <?php
                        $options = get_field('technology_options', 'category_' . $cat->term_id);
	                    $posts_page_id = get_option('page_for_posts');
	                    $category_link = esc_url( add_query_arg( 'category', $cat->slug, get_permalink($posts_page_id) ) );
                        ?>
                        <li class="body cats-list__item">
                            <a href="<?= esc_url( $category_link ); ?>"
                               class="<?= ( $category_slug == $cat->slug ) ? 'active' : ''; ?>">
                                <?php if (!empty($options['icon'])): ?>
                                    <img src="<?= esc_url( $options['icon']['url'] ) ?>"
                                     alt="<?= esc_attr( $options['icon']['alt'] ) ?>">
                                <?php endif; ?>
                                <span>
                                    <?= $cat->name ?>
                                </span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <h4 class="heading-h4 heading block-title">
					<?= __('Social Media', 'content') ?>
                </h4>
				<?php if (!empty($footer['socials'])): ?>
                    <div class="footer__socials">
						<?php foreach ($footer['socials'] as $social) : ?>
                            <a href="<?= $social['url'] ?>">
                                <img src="<?= esc_url( $social['icon']['url'] ) ?>" alt="<?= esc_attr( $social['icon']['alt'] ) ?>">
                            </a>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
            </div>
		</div>
	</div>
</section>
