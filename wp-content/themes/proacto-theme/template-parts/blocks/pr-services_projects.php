<?php
//main class name for block
$className = 'baner';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$services = get_field('services');
//Services title
// Split the string into an array of words
$words = explode(' ', $services['title']);
// Check if the array has more than one word
if (isset($words[1])) {
	// Wrap the second word with the <em> tag
	$words[1] = '<em>' . $words[1] . '</em>';
}
// Join the words back into a string
$services['title'] = implode(' ', $words);

$projects = get_field('projects');
//Services title
// Split the string into an array of words
$words = explode(' ', $projects['title']);
// Check if the array has more than one word
if (isset($words[1])) {
	// Wrap the second word with the <em> tag
	$words[1] = '<em>' . $words[1] . '</em>';
}
// Join the words back into a string
$projects['title'] = implode(' ', $words);

if ($projects['choose']) {
	$posts = $projects['projects'];
} else {
    $posts = get_posts(array(
        'post_type' => 'projects',
        'numberposts' => 6,
    ));
};


$footer = get_field('footer_options', 'options');

?>

<section class="services_projects">
	<div class="container">
		<div class="services">
			<h2 class="title heading heading-h2">
				<?= $services['title'] ?>
			</h2>
			<p class="body text">
				<?= $services['text'] ?>
			</p>
			<?php if(!empty($services['services'])) : ?>
				<div class="services__wrap">
					<?php foreach($services['services'] as $service): ?>
						<?php
						$words = explode(' ', $service['title']);
						// Check if the array has more than one word
						if (isset($words[0])) {
							// Wrap the second word with the <em> tag
							$words[0] = '<em>' . $words[0] . '</em>';
						}
						// Join the words back into a string
						$service['title'] = implode(' ', $words);
						?>
						<div class="service_card gradient-border">
							<img class="service_card__img desktop" src="<?= esc_url($service['image_desktop']['url']) ?>" alt="<?= esc_attr($service['image_desktop']['alt']) ?>">
							<img class="service_card__img mobile" src="<?= esc_url($service['image_mobile']['url']) ?>" alt="<?= esc_attr($service['image_mobile']['alt']) ?>">
							<div class="service_card__texts">
								<h3 class="title heading heading-h3">
									<?= !empty($service['title']) ? $service['title'] : '' ?>
								</h3>
								<p class="text body">
									<?= !empty($service['text']) ? $service['text'] : '' ?>
								</p>
								<?php if (!empty($service['button'])): ?>
									<a href="<?= $service['button']['url'] ?>" class="button secondary">
										<?= $service['button']['title'] ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
        <div class="projects">
            <div class="projects__head">
                <h2 class="title heading heading-h2">
                    <?= $projects['title'] ?>
                </h2>
                <?php if(!empty($footer['socials'])): ?>
                    <div class="socials_wrap">
                        <?php foreach ($footer['socials'] as $social): ?>
                            <a href="<?= $social['url'] ?>">
                                <img src="<?= esc_url( $social['icon']['url'] ) ?>" alt="<?= esc_attr( $social['icon']['alt'] ) ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="projects_grid">
                <?php foreach($posts as $post): ?>
                    <?php
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
                    <div class="project_card">
                        <img src="<?= $img_url ?>" alt="<?= $img_alt ?>" class="project_card__img">
                        <a class="project_card__link" href="<?= $link ?>">
                            <span class="project_card__texts">
                                <h3 class="heading heading-h3 title">
                                    <?= $title ?>
                                </h3>
                                <span class="body technology">
                                    <?= $term_name ?>
                                </span>
                            </span>
                            <button class="arrow-button secondary"></button>
                        </a>
                    </div>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <?php if(!empty($projects['button'])): ?>
                <a href="<?= $projects['button']['url'] ?>" class="show-more">
	                <?= $projects['button']['title'] ?>
                </a>
            <?php endif; ?>
        </div>
	</div>
</section>
