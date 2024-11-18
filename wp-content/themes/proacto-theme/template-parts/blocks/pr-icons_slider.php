<?php
//main class name for block
$className = 'icons_slider';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$icons_slider = get_field('icons_slider');
$title = !empty($icons_slider['title']) ? $icons_slider['title'] : __('Title', 'proacto');
$block_options = get_field('block_options');
?>

<section class="<?php echo  esc_attr($className)?>" >
    <?php add_decorative_line($block_options) ?>
    <div class="container">
		<h2 class="title heading heading-h2">
			<?= $icons_slider['title'] ?>
		</h2>

	    <?php if(!empty($icons_slider)): ?>
            <div class="icons_slick">
                <?php foreach ($icons_slider['slider'] as $slide) : ?>
                    <img src="<?= esc_url( $slide['image']['url'] ) ?>"
                         alt="<?= esc_attr( $slide['image']['alt'] ) ?>">
                <?php endforeach; ?>
            </div>
	    <?php endif; ?>


        <!--NOT WORKING NOW-->
	    <?php if(!empty($icons_slider) && false): ?> <!-- For future -->
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
