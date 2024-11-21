<?php
//main class name for block
$className = 'portfolio_sections';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$portfolio_sections = get_field('portfolio_sections');
$block_options = get_field('block_options');

$title = $portfolio_sections['title'] ?? __('Our 2D Art Services', 'proacto');
$title = add_em_words($title, array(0));
$text = $portfolio_sections['text']

?>

<section class="<?php echo  esc_attr($className)?>">
	<div class="portfolio_sections__head">
		<div class="container">
			<h2 class="heading heading-h2 section_title">
				<?= $title ?>
			</h2>
			<p class="body section_block">
				<?= $text ?>
			</p>
		</div>
    </div>
    <?php foreach($portfolio_sections['sections'] as $key => $section): ?>
        <?php
        $img_url = esc_url($section['background']['url']);
        $img_alt = esc_attr($section['background']['alt']);
        $img_mob_url = !empty($section['background_mob']['url']) ? esc_url($section['background_mob']['url']) : esc_url($section['background']['url']);
	    $img_mob_alt = !empty($section['background_mob']['alt']) ? esc_attr($section['background_mob']['alt']) : esc_attr($section['background']['alt']);
        $block_title = $section['title'];
        $block_title = add_em_words($block_title, array($key));
        $color = $section['color'];
        ?>
        <div class="portfolio_section <?= $section['direction'] ?>" style="background-color: <?= $color ?>;">
	        <?php add_decorative_line(array('underline'=>'light')) ?>
            <img src="<?= $img_url ?> " alt="<?= $img_alt ?>" class="desktop">
            <img src="<?= $img_mob_url ?> " alt="<?= $img_mob_alt ?>" class="mobile">
            <?php if($section['direction'] == 'right'): ?>
                <div class="gradient-overlay desktop" style="background: linear-gradient(270deg, <?= $color ?> 0%, <?= $color ?>00 21.43%);"></div>
            <?php else: ?>
                <div class="gradient-overlay desktop" style="background: linear-gradient(90deg, <?= $color ?> 0%, <?= $color ?>00 21.43%);"></div>
            <?php endif; ?>
            <div class="container">
                <div class="portfolio_section__wrap <?= $section['direction'] ?>">
                    <h3 class="heading heading-h2 block_title">
                        <?= $block_title ?>
                    </h3>
                    <?php if(!empty($section['text'])): ?>
                        <p class="body block_text">
                            <?= $section['text'] ?>
                        </p>
                    <?php endif; ?>
                    <?php if(!empty($section['button']['url'])): ?>
                        <a href="<?= $section['button']['url'] ?>" class="button secondary filter-trigger">
                            <?= $section['button']['title'] ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
