<?php
//main class name for block
$className = 'photo_gallery';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$photo_gallery = get_field('photo_gallery');
$title = !empty($photo_gallery['title']) ? $photo_gallery['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(1));
?>

<section class="<?= esc_attr($className)?>" >
	<div class="container">
		<h2 class="heading heading-h2 section-title">
			<?= $title ?>
		</h2>
		<div class="photo_gallery__wrap swiper">
			<div class="swiper-wrapper">
				<?php foreach ($photo_gallery['gallery'] as $item) : ?>
					<img src="<?= esc_url( $item['url'] ) ?>" alt="<?= esc_attr($item['alt']) ?>" class="swiper-slide">
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
