<?php
//main class name for block
$className = 'video';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$video = get_field('video');
$title = !empty($video['title']) ? $video['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(0));
$block_options = get_field('block_options');
?>

<section class="<?= $className ?>">
	<?php add_decorative_line($block_options) ?>
	<div class="container">
		<div class="video__wrap">
			<h2 class="heading heading-h2 section_title">
				<?= $title ?>
			</h2>
			<?php if( !empty($video['text'])) : ?>
				<p class="body section_text">
					<?= $video['text'] ?>
				</p>
			<?php endif; ?>
            <div class="video__wrap__embed">
			    <?= $video['embed'] ?>
            </div>
		</div>
	</div>
</section>
