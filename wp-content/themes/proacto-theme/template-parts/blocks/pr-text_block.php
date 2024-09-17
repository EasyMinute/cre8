<?php
//main class name for block
$className = 'text_block';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$text_block = get_field('text_block');
?>

<section class="<?php echo esc_attr($className)?>" >
	<div class="container">
		<?= $text_block ?>
	</div>
</section>
