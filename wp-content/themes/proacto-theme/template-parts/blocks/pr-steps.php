<?php
//main class name for block
$className = 'steps';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$steps = get_field('steps');
$title = !empty($steps['title']) ? $steps['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(1,2));
?>

<section class="<?= $className ?>">
	<div class="container">
		<h2 class="heading heading-h2 section-title">
			<?= $title ?>
		</h2>
		<div class="steps__wrap">
			<?php foreach ($steps['steps'] as $key => $step): ?>
				<div class="step_card">
					<div class="step_card__number">
						<?= $key + 1 ?>
					</div>
					<div class="step_card__texts">
						<h3 class="heading heading-h4 block-title">
							<?= $step['title'] ?>
						</h3>
						<p class="body block-text">
							<?= $step['text'] ?>
						</p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
