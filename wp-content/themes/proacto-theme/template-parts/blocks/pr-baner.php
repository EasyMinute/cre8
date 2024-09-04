<?php
//main class name for block
$className = 'baner';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$baner = get_field('baner');
$bg = esc_url($baner['background']['url']);

?>

<section class="<?php echo  esc_attr($className)?>" style="background-image: url(<?= $bg ?>)">
	<div class="container">
		<div class="baner__wrap">
            <div class="baner__texts">
                <div class="title heading heading-h1 bold">
                    <?= $baner['title'] ?>
                </div>
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
	</div>
</section>