<?php
//main class name for block
$className = 'icons_list';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$icons_list = get_field('icons_list');
$title = !empty($icons_list['title']) ? $icons_list['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(2));
$block_options = get_field('block_options');
$img_url = !empty($icons_list['image']['url']) ? esc_url($icons_list['image']['url']) : '';
$img_alt = !empty($icons_list['image']['alt']) ? esc_url($icons_list['image']['alt']) : '';
?>

<section class="<?= $className ?>">
	<?php add_decorative_line($block_options) ?>
	<img src="<?= $img_url ?>" alt="<?= $img_alt ?>" class="section_image">
	<div class="container">
		<div class="icons_list__wrap">
			<h2 class="heading heading-h2 section_title">
				<?= $title ?>
			</h2>
			<div class="icons_list__wrap__list">
				<svg width="2" height="632" viewBox="0 0 2 632" fill="none" xmlns="http://www.w3.org/2000/svg">
					<line x1="0.75" y1="-3.27835e-08" x2="0.750028" y2="632" stroke="url(#paint0_radial_1363_3689)" stroke-width="1.5" stroke-dasharray="5 5"/>
					<defs>
						<radialGradient id="paint0_radial_1363_3689" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(-0.500067 -194.378) rotate(90) scale(1006.1 926.5)">
							<stop offset="0.184083" stop-color="#F97A58"/>
							<stop offset="0.882699" stop-color="#F97A58" stop-opacity="0.2"/>
						</radialGradient>
					</defs>
				</svg>
				<?php foreach ($icons_list['list'] as $item): ?>
				    <div class="icons_list_item">
					    <div class="icon_wrap">
						    <img src="<?= esc_url( $item['icon']['url'] ) ?>"
						         alt="<?= esc_attr( $item['icon']['alt'] ) ?>">
					    </div>
                        <div class="texts">
                            <h3 class="heading heading-h2 block-title">
                                <?= add_em_words($item['title'], array(0)) ?>
                            </h3>
                            <p class="body block_text">
                                <?= $item['text'] ?>
                            </p>
                        </div>
				    </div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</section>
