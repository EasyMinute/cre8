<?php
//main class name for block
$className = 'text_block';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$text_block = get_field('text_block');

$block_options = get_field('block_options');
?>

<section class="<?php echo esc_attr($className)?>" >
    <?php add_decorative_line($block_options) ?>
	<div class="container">
		<?= $text_block ?>
	</div>
</section>
