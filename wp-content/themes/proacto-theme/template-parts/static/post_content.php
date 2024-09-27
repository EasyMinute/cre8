<?php
$post_id = get_query_var('post_id'); // Retrieve the passed post_id

$footer = get_field('footer_options', 'options');

?>

<section class="post_content">
	<div class="container">
		<div class="post_content__wrap">
			<div class="post_content__wrap__main">
                <?php the_content(); ?>
			</div>
			<div class="post_content__wrap__sidebar">
				<h4 class="heading-h4 heading block-title">
					<?= __('Table of Content', 'content') ?>
				</h4>
                <?= do_shortcode('[ez-toc]') ?>
                <h4 class="heading-h4 heading block-title">
					<?= __('Social Media', 'content') ?>
                </h4>
				<?php if (!empty($footer['socials'])): ?>
                    <div class="footer__socials">
						<?php foreach ($footer['socials'] as $social) : ?>
                            <a href="<?= $social['url'] ?>">
                                <img src="<?= esc_url( $social['icon']['url'] ) ?>" alt="<?= esc_attr( $social['icon']['alt'] ) ?>">
                            </a>
						<?php endforeach; ?>
                    </div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
