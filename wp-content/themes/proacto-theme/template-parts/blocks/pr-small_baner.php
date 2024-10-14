<?php
//main class name for block
$className = 'small_baner';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$small_baner = get_field('small_baner');
$title = !empty($small_baner['title']) ? $small_baner['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(1));
$bg_url = $small_baner['background']['url'];
$color = $small_baner['color'];

$footer = get_field('footer_options', 'options');

$class = '';
if (is_singular('projects')) {
	$className .= ' project-banner';
    $technologies = get_the_terms(get_the_ID(), 'technology');
    $term = !empty($technologies) ? $technologies['0'] : false;
    if($term) {
	    $options = get_field( 'technology_options', 'technology_' . $term->term_id );
	    $icon_url = esc_url($options['icon']['url']);
	    $icon_alt = esc_attr($options['icon']['alt']);
    }
}

?>

<section class="<?= $className ?>" style="background-image: url(<?= $bg_url ?>); background-color: <?= $color ?>">
    <div class="gradient-overlay desktop" style="background: linear-gradient(90deg, <?= $color ?> 15.07%, <?= $color ?>00 83.41%);"></div>
    <div class="gradient-overlay mobile" style="background: linear-gradient(360deg, <?= $color ?> 30.82%, <?= $color ?>00 80%);"></div>
	<div class="container">
		<div class="small_baner__wrap">
            <?php if(isset($term) && $term): ?>
                <p class="body project-term">
                    <?php if(isset($icon_url)): ?>
                        <img src="<?= $icon_url ?>" alt="<?= $icon_alt ?>">
                        <?= $term->name ?>
                    <?php endif; ?>
                </p>
            <?php endif; ?>
			<h1 class="heading heading-h2">
				<?= $title ?>
			</h1>
            <?php if (!empty($small_baner['text'])) : ?>
                <p class="body">
                    <?= $small_baner['text'] ?>
                </p>
            <?php endif; ?>
			<?php if(!empty($footer['socials']) && !$small_baner['hide_socials']): ?>
                <div class="socials_wrap">
					<?php foreach ($footer['socials'] as $social): ?>
                        <a  target="_blank" href="<?= $social['url'] ?>">
                            <img src="<?= esc_url( $social['icon']['url'] ) ?>" alt="<?= esc_attr( $social['icon']['alt'] ) ?>">
                        </a>
					<?php endforeach; ?>
                </div>
			<?php endif; ?>
		</div>
	</div>
</section>
