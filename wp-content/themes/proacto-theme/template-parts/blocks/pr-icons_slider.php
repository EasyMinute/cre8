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
            <div class="swiper-container marqueeswiper">
                <div class="swiper-wrapper">
	                <?php
	                $slides = $icons_slider['slider'];
	                $totalSlides = count($slides);
	                $minimumSlides = 18;

	                if ($totalSlides > 0):
	                $repeatCount = ceil($minimumSlides / $totalSlides); // Calculate how many times to repeat
	                ?>
                        <?php for ($i = 0; $i < $repeatCount; $i++): // Outer loop to ensure minimum slides ?>
                            <?php foreach ($slides as $slide): ?>
                                <div class="swiper-slide">
                                    <img src="<?= esc_url( $slide['image']['url'] ) ?>"
                                         alt="<?= esc_attr( $slide['image']['alt'] ) ?>">
                                </div>
                            <?php endforeach; ?>
                        <?php endfor; ?>
	                <?php endif; ?>

                </div>
            </div>
	    <?php endif; ?>

	    <?php if(!empty($icons_slider) && false): ?>
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
