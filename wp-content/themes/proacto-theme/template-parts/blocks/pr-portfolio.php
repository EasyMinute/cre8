<?php
//main class name for block
$className = 'portfolio';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$portfolio = get_field('portfolio');
$title = !empty($portfolio['title']) ? $portfolio['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(1));
$text = !empty($portfolio['text']) ? $portfolio['text'] : __('Text', 'proacto');
$cards = $portfolio['cards'];
$block_options = get_field('block_options');
?>

<section class="<?= $className ?>">
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<h2 class="title heading heading-h2">
			<?= $title ?>
		</h2>
		<p class="body text">
			<?= $text ?>
		</p>
		<?php if ($cards): ?>
			<div class="swiper portfolio_swiper">
				<div class="swiper-wrapper">
					<?php foreach ($cards as $key => $card): ?>
						<?php
						$img_desk = $card['desktop_image'];
						$img_mob = $card['mobile_image'];
						$link = $card['link'];
						$title = add_em_words($card['link']['title'], array(0,1));
						$text = $card['text'];
						?>
						<div class="portfolio-card swiper-slide <?= $key==0 ? 'main' : '' ?>">
							<img src="<?= esc_url( $img_desk['url'] ) ?>" alt="<?= esc_attr( $img_desk['alt'] ) ?>" class="desktop">
							<img src="<?= esc_url( $img_mob['url'] ) ?>" alt="<?= esc_attr( $img_mob['alt'] ) ?>" class="mobile">
							<div class="portfolio-card__texts">
								<h3 class="heading heading-h2">
									<?= $title ?>
								</h3>
								<p class="body">
									<?= $text ?>
								</p>
								<a href="<?= $link['url'] ?>" class="link-overlay"></a>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
            <div class="portfolio_pagination"></div>
		<?php endif; ?>
	</div>
</section>
