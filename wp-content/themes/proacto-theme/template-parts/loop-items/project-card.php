<?php if (isset($post)): ?>
	<div class="project_card">
		<?php
		$title = get_the_title($post);
		$img_url = get_the_post_thumbnail_url($post);
		$img_alt = get_the_post_thumbnail_caption($post);
		$link = get_the_permalink($post);
		$terms = get_the_terms($post->ID, 'technology');
		$term_name = $terms ? $terms[0]->name : __('Project', 'proacto');
		?>
		<img src="<?= esc_url($img_url) ?>" alt="<?= esc_attr($img_alt) ?>" class="project_card__img">
		<a class="project_card__link" href="<?= esc_url($link) ?>">
            <span class="project_card__texts">
                <h3 class="heading heading-h3 title">
                    <?= esc_html($title) ?>
                </h3>
                <span class="body technology">
                    <?= esc_html($term_name) ?>
                </span>
            </span>
			<button class="arrow-button secondary"></button>
		</a>
	</div>
<?php endif; ?>
