<?php
//main class name for block
$className = 'baner';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$baner = get_field('baner');
$block_options = get_field('block_options');

?>

<section class="<?php echo  esc_attr($className)?>">
    <?php add_decorative_line($block_options) ?>
    <div class="container">
        <div class="baner__texts">
            <div class="baner_pagination"></div>
            <h1 class="title heading heading-h1 bold">
				<?= add_em_words($baner['title'], array(1)) ?>
            </h1>
            <p class="text body">
				<?= $baner['text'] ?>
            </p>
			<?php if (!empty($baner['button'])): ?>
                <a href="<?= $baner['button']['url'] ?>" class="button button-m primary arrowed">
					<?= $baner['button']['title'] ?>
                </a>
			<?php endif; ?>
        </div>
    </div>
    <div class="baner-slider swiper">
        <div class="swiper-wrapper">
            <?php foreach ($baner['slider'] as $slide): ?>
                <?php
                $img_desk = !empty($slide['background']) ? $slide['background'] : false;
	            $img_mob = !empty($slide['background_mob']) ? $slide['background_mob'] : false;
                ?>
                <div class="swiper-slide" style="background-color: <?= $slide['color'] ?>;">
                    <div class="baner__wrap">
                        <div class="gradient-overlay desktop" style="background:linear-gradient(0deg,  <?= $slide['color'] ?>  15.07%, rgba(9, 50, 56, 0) 83.41%);"></div>
                        <?php if($img_desk): ?>
                            <img src="<?= esc_url($img_desk['url']) ?>" alt="<?= esc_attr($img_desk['alt']) ?>" class="banner_bg desktop">
                        <?php endif ?>
	                    <?php if($img_mob): ?>
                            <img src="<?= esc_url($img_mob['url']) ?>" alt="<?= esc_attr($img_mob['alt']) ?>" class="banner_bg mobile">
	                    <?php endif ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>