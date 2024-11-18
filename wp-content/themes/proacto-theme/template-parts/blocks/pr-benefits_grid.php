<?php
//main class name for block
$className = 'benefits_grid';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$benefits_grid = get_field('benefits_grid');
$className .= ' ' . $benefits_grid['style'];
$title = !empty($benefits_grid['title']) ? $benefits_grid['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(0));
$block_options = get_field('block_options');
?>

<section class="<?= $className ?>">
    <?php add_decorative_line($block_options) ?>
    <div class="container">
        <h2 class="heading heading-h2 title">
            <?= $title ?>
        </h2>
        <div class="benefits_grid__wrap">
            <?php foreach ($benefits_grid['benefits'] as $item): ?>
                <?php
                $title = add_em_words($item['title'], array(0));
                $img_url = esc_url($item['image']['url']);
	            $img_alt = esc_attr($item['image']['alt']);
                ?>
                <div class="benefits-card gradient-border">
                    <img src="<?= $img_url ?>" alt="<?= $img_alt ?>">
                    <h3 class="title heading heading-h4">
                        <?= $title ?>
                    </h3>
                    <p class="body text">
                        <?= $item['text'] ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
