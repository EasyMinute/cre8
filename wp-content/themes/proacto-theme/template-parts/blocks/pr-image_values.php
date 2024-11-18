<?php
//main class name for block
$className = 'image_values';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$image_values = get_field('image_values');
$title = !empty($image_values['title']) ? $image_values['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(2,3,4));
$block_options = get_field('block_options');
?>

<section class="<?= $className ?>">
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<div class="image_values__wrap">
			<img src="<?= esc_url( $image_values['image']['url'] ) ?>" alt="<?= esc_attr($image_values['image']['alt']) ?>" class="image_values__wrap__image">
			<div class="image_values__wrap__texts">
                <h2 class="heading-h2 heading section-title">
					<?= $title ?>
                </h2>
                <div class="image_values__wrap__texts__grid">
                    <?php foreach($image_values['values'] as $item): ?>
                        <div class="value_card">
                            <div class="value_card__head">
                                <img src="<?= esc_url( $item['icon']['url'] ) ?>" alt="<?= esc_attr( $item['icon']['alt'] ) ?>">
                                <h3 class="heading-h4 heading block-title">
                                    <?= $item['title'] ?>
                                </h3>
                            </div>
                            <p class="body block-text">
                                <?= $item['text'] ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
			</div>
		</div>
	</div>
</section>
