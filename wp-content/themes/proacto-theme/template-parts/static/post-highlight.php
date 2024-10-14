<?php
$post_id = get_query_var('post_id'); // Retrieve the passed post_id

$post_options = get_field('post_options', $post_id);
$baner_desktop_url = !empty($post_options['baner_desktop']) ? esc_url($post_options['baner_desktop']['url']) : '';
$baner_desktop_alt = !empty($post_options['baner_desktop']) ? esc_attr($post_options['baner_desktop']['alt']) : '';
$baner_mobile_url = !empty($post_options['baner_mobile']) ? esc_url($post_options['baner_mobile']['url']) : '';
$baner_mobile_alt = !empty($post_options['baner_mobile']) ? esc_attr($post_options['baner_mobile']['alt']) : '';
$author = $post_options['author'];
$title = get_the_title($post_id);
$date = get_the_date('d M Y', $post_id);
$categories = get_the_category($post_id);
$blog_url = get_permalink( get_option( 'page_for_posts' ));
?>

<section class="post_highlight">
	<img src="<?= $baner_desktop_url ?>" alt="<?= $baner_desktop_alt ?>" class="post_highlight__bg desktop">
	<img src="<?= $baner_mobile_url ?>" alt="<?= $baner_mobile_alt ?>" class="post_highlight__bg mobile">
	<div class="container">
		<div class="post_highlight__text">
			<a href="<?= $blog_url ?>" class="body blog-link">
				<svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0.219375 8.53055L6.96937 15.2806C7.11011 15.4213 7.30098 15.5003 7.5 15.5003C7.69902 15.5003 7.88989 15.4213 8.03063 15.2806C8.17136 15.1398 8.25042 14.949 8.25042 14.7499C8.25042 14.5509 8.17136 14.36 8.03063 14.2193L2.56031 8.74993H17.25C17.4489 8.74993 17.6397 8.67091 17.7803 8.53026C17.921 8.38961 18 8.19884 18 7.99993C18 7.80102 17.921 7.61025 17.7803 7.4696C17.6397 7.32895 17.4489 7.24993 17.25 7.24993H2.56031L8.03063 1.78055C8.17136 1.63982 8.25042 1.44895 8.25042 1.24993C8.25042 1.05091 8.17136 0.860034 8.03063 0.719304C7.88989 0.578573 7.69902 0.499512 7.5 0.499512C7.30098 0.499512 7.11011 0.578573 6.96937 0.719304L0.219375 7.4693C0.149642 7.53896 0.0943228 7.62167 0.0565796 7.71272C0.0188364 7.80377 -0.000589371 7.90137 -0.000589371 7.99993C-0.000589371 8.09849 0.0188364 8.19609 0.0565796 8.28713C0.0943228 8.37818 0.149642 8.4609 0.219375 8.53055Z" fill="white"/>
				</svg>
				<?= __('Back To Blog Page', 'proacto') ?>
			</a>
			<?php if ($categories): ?>
				<div class="post_highlight__text__cats">
					<?php foreach ($categories as $cat): ?>
						<span class="body body-14">
							<?= $cat->name ?>
						</span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<h1 class="heading-h2 heading section-title">
				<?= $title ?>
			</h1>
			<?php if(!empty($author)): ?>
				<div class="post_highlight__text__meta">
					<?php if(isset($author['photo']['url'])): ?>
						<img src="<?= esc_url($author['photo']['url']) ?>" alt="<?= esc_attr($author['photo']['alt']) ?>" class="author-img">
					<?php endif; ?>
					<span class="body author-name">
						<?= $author['name'] ?>
					</span>
					<span class="body date">
						<?= $date ?>
					</span>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
