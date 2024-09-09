<?php
//main class name for block
$className = 'icons_slider';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$icons_slider = get_field('icons_slider');
$title = !empty($icons_slider['title']) ? $icons_slider['title'] : __('Title', 'proacto');
?>

<section class="<?php echo  esc_attr($className)?>" >
	<div class="container">
		<h2 class="title heading heading-h2">
			<?= $icons_slider['title'] ?>
		</h2>
		<?php if(!empty($icons_slider)): ?>
			<div class="swiper icons_slider__swiper">
				<div class="swiper-wrapper">
					<?php foreach ($icons_slider['slider'] as $slide) : ?>
						<div class="swiper-slide">
							<img src="<?= esc_url( $slide['image']['url'] ) ?>"
							     alt="<?= esc_attr( $slide['image']['alt'] ) ?>">
							<?php if(!empty($slide['url'])): ?>
								<a href="<?= $slide['url'] ?>" class="link-overlay"></a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
