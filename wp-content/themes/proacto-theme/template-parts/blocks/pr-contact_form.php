<?php
//main class name for block
$className = 'contact_form';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$contact_form = get_field('contact_form');
$title = !empty($contact_form['title']) ? $contact_form['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(3,4,5,6));
$text = !empty($contact_form['text']) ? $contact_form['text'] : __('Text', 'proacto');
$image_url = esc_url($contact_form['image']['url']);
$image_alt = esc_url($contact_form['image']['alt']);
//$form_id = $contact_form['form']['id'];
?>

<div class="is-style-image">
<section class="<?php echo esc_attr($className)?>" >
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
                <?= do_shortcode($contact_form['form']) ?>
            </div>
        </div>
    </div>
</section>
</div>
