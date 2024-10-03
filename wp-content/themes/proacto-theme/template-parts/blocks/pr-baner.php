<?php
//main class name for block
$className = 'baner';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$baner = get_field('baner');


?>

<section class="<?php echo  esc_attr($className)?>">
    <div class="baner-slider swiper">
        <div class="swiper-wrapper">
            <?php foreach ($baner as $slide): ?>
                <?php
                $img_desk = !empty($slide['background']) ? $slide['background'] : false;
	            $img_mob = !empty($slide['background_mob']) ? $slide['background_mob'] : false;
                ?>
                <div class="swiper-slide" style="background-color: <?= $slide['color'] ?>;">
                    <div class="baner__wrap">
                        <div class="gradient-overlay desktop" style="background: linear-gradient(90deg, <?= $slide['color'] ?> 15.07%, <?= $slide['color'] ?>00 83.41%);"></div>
                        <div class="gradient-overlay mobile" style="background: linear-gradient(360deg, <?= $slide['color'] ?> 30.82%, <?= $slide['color'] ?>00 80%);"></div>
                        <?php if($img_desk): ?>
                            <img src="<?= esc_url($img_desk['url']) ?>" alt="<?= esc_attr($img_desk['alt']) ?>" class="banner_bg desktop">
                        <?php endif ?>
	                    <?php if($img_mob): ?>
                            <img src="<?= esc_url($img_mob['url']) ?>" alt="<?= esc_attr($img_mob['alt']) ?>" class="banner_bg mobile">
	                    <?php endif ?>
                        <div class="baner__texts">
                            <h1 class="title heading heading-h1 bold">
                                <?= add_em_words($slide['title'], array(1)) ?>
                            </h1>
                            <p class="text body">
                                <?= $slide['text'] ?>
                            </p>
                            <?php if (!empty($slide['button'])): ?>
                                <a href="<?= $slide['button']['url'] ?>" class="button button-m primary arrowed">
                                    <?= $slide['button']['title'] ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="baner_pagination"></div>
</section>