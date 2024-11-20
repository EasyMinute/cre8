<?php
//main class name for block
$className = 'contact_form';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$contact_form = get_field('contact_form');
$title = !empty($contact_form['title']) ? $contact_form['title'] : __('READY TO START A NEW PROJECT?', 'proacto');
$title = add_em_words($title, array(3,4,5,6));
$text = !empty($contact_form['text']) ? $contact_form['text'] : __('Contact us now to find out more about our capabilities and realize your game art idea.', 'proacto');
$image_url = !empty($contact_form['image']['url']) ? esc_url($contact_form['image']['url']) : get_stylesheet_directory_uri() . '/assets/img/static/frog.png';
$image_alt = !empty($contact_form['image']['url']) ? esc_attr($contact_form['image']['alt']) : 'Frog';
//$form_id = $contact_form['form']['id'];
$block_options = get_field('block_options');
$shortcode = !empty($contact_form['form']) ? $contact_form['form'] : '[contact-form-7 id="888415d" title="Contact form 1"]';
?>

<div class="is-style-image">
<section class="<?php echo esc_attr($className)?>" >
    <?php add_decorative_line($block_options) ?>
    <div class="container">
        <div class="contact_form__wrap">
            <img src="<?= $image_url ?>" alt="<?= $image_alt ?>" class="contact_form__wrap-image">
            <div class="contact_form__wrap_texts">
                <h2 class="heading-h2 heading title">
                    <?= $title ?>
                </h2>
                <p class="body text">
	                <?= $text ?>
                </p>
                <?= do_shortcode($shortcode) ?>
            </div>
        </div>
    </div>
</section>
</div>
