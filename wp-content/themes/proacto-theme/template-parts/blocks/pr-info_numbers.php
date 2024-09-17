<?php
//main class name for block
$className = 'info_numbers';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$info_numbers = get_field('info_numbers');
$title = !empty($info_numbers['title']) ? $info_numbers['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(1));
$text = !empty($info_numbers['text']) ? $info_numbers['text'] : __('Text', 'proacto');
$numbers = $info_numbers['numbers'];
$class = $info_numbers['reverse'] ? 'reverse' : '';
?>

<section class="<?php echo  esc_attr($className)?>">
	<div class="container">
		<div class="info_numbers__wrap <?= $class ?>">
			<?php if (!empty($numbers)): ?>
				<ul class="info_numbers__numbers">
					<?php foreach ($numbers as $item): ?>
						<li class="infonumber_card">
							<p class="title heading heading-h2">
								<?= $item['number'] ?>
							</p>
							<p class="text body">
								<?= $item['text'] ?>
							</p>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			<div class="info_numbers__texts">
				<h2 class="heading heading-h2 title">
					<?= $title ?>
				</h2>
				<p class="body text">
					<?= $text ?>
				</p>
			</div>
		</div>
	</div>
</section>