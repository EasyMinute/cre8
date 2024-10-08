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
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
					<?php foreach ($icons_slider['slider'] as $slide) : ?>
						<div class="splide__slide">
							<img src="<?= esc_url( $slide['image']['url'] ) ?>"
							     alt="<?= esc_attr( $slide['image']['alt'] ) ?>">
							<?php if(!empty($slide['url'])): ?>
								<a href="<?= $slide['url'] ?>" class="link-overlay"></a>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
		<?php endif; ?>
    </div>
</section>
