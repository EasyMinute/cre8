<?php
//main class name for block
$className = 'testimonials_slider';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$testimonials_slider = get_field('testimonials_slider');
$title = !empty($testimonials_slider['title']) ? $testimonials_slider['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(2,3));
$testimonials = $testimonials_slider['testimonials'];

$block_options = get_field('block_options');
?>

<section class="<?php echo  esc_attr($className)?>" >
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<h2 class="heading heading-h2">
			<?= $title ?>
		</h2>
		<div class="testimonials_slider__wrap">
			<div class="testimonials_prev swiper-button swiper-button-prev"></div>
			<div class="testimonials_swiper swiper">
				<div class="swiper-wrapper">
					<?php foreach($testimonials as $item) : ?>
						<?php
						$img_url = esc_url($item['photo']['url']);
						$img_alt = esc_attr($item['photo']['alt']);
						?>
						<div class="swiper-slide testimonial-card gradient-border">
							<div class="testimonial-card__author">
								<img src="<?= $img_url ?>" alt="<?= $img_alt ?>">
								<p class="body">
									<span class="name">
										<?= $item['name'] ?>
									</span>
									<br>
									<span class="company">
										<?= $item['company'] ?>
									</span>
								</p>
							</div>
							<p class="body testimonial-card__text">
								<?= $item['text'] ?>
							</p>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="testimonials_next swiper-button swiper-button-next"></div>
            <div class="testimonials_pagination swiper-pagination"></div>
		</div>
	</div>
</section>