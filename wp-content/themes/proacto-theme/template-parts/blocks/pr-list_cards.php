<?php
//main class name for block
$className = 'list_cards';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$list_cards = get_field('list_cards');
$title = !empty($list_cards['title']) ? $list_cards['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(0));
$block_options = get_field('block_options');
?>

<section class="<?php echo esc_attr($className)?>" >
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<h2 class="heading heading-h2 section-title">
			<?= $title ?>
		</h2>
		<div class="list_cards__wrap">
			<?php foreach ($list_cards['cards'] as $card) : ?>
				<?php
				$desk_url = esc_url($card['bg_desktop']['url']);
				$desk_alt = esc_attr($card['bg_desktop']['alt']);
				$mob_url = esc_url($card['bg_mobile']['url']);
				$mob_alt = esc_attr($card['bg_mobile']['alt']);
				?>
			    <div class="list_card gradient-border">
				    <img src="<?= $desk_url ?>" alt="<?= $desk_url ?>" class="list_card__image desktop">
				    <img src="<?= $mob_url ?>" alt="<?= $mob_url ?>" class="list_card__image mobile">
				    <h3 class="heading heading-h2 block-title">
					    <?= add_em_words($card['title'], array(0)) ?>
				    </h3>
				    <ul class="list_card__list">
					    <?php foreach ($card['bullets'] as $bullet) : ?>
					        <li class="body">
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M15.8751 8.5C15.8769 8.73071 15.8068 8.95626 15.6745 9.14528C15.5421 9.33429 15.3542 9.47739 15.1368 9.55468L10.6762 11.1768L9.05481 15.6367C8.97489 15.852 8.831 16.0377 8.64246 16.1688C8.45392 16.2999 8.22977 16.3702 8.00012 16.3702C7.77047 16.3702 7.54631 16.2999 7.35778 16.1688C7.16924 16.0377 7.02535 15.852 6.94543 15.6367L5.32332 11.1719L0.863399 9.55468C0.6481 9.47477 0.462416 9.33088 0.331291 9.14234C0.200166 8.9538 0.129883 8.72965 0.129883 8.5C0.129883 8.27034 0.200166 8.04619 0.331291 7.85765C0.462416 7.66912 0.6481 7.52522 0.863399 7.44531L5.32824 5.8232L6.94543 1.36328C7.02535 1.14798 7.16924 0.962294 7.35778 0.831169C7.54631 0.700044 7.77047 0.629761 8.00012 0.629761C8.22977 0.629761 8.45392 0.700044 8.64246 0.831169C8.831 0.962294 8.97489 1.14798 9.05481 1.36328L10.6769 5.82812L15.1368 7.44531C15.3542 7.5226 15.5421 7.6657 15.6745 7.85472C15.8068 8.04373 15.8769 8.26928 15.8751 8.5Z" fill="#F97A58"/> </svg>
                                <?= $bullet['text'] ?>
					        </li>
					    <?php endforeach ?>
				    </ul>
			    </div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
