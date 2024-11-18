<?php
//main class name for block
$className = 'faq';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$faq = get_field('faq');
$title = !empty($faq['title']) ? $faq['title'] : __('Title', 'proacto');
$title = add_em_words($title, array(0));
$block_options = get_field('block_options');

$bg_url = esc_url($faq['bg']['url']);
$bg_alt = esc_attr($faq['bg']['alt']);
$image_url = esc_url($faq['image']['url']);
$image_alt = esc_attr($faq['image']['alt']);

?>

<section class="<?= $className ?>">
	<?php add_decorative_line($block_options) ?>
    <img src="<?= $bg_url ?>" alt="<?= $bg_alt ?>" class="section_bg">
    <img src="<?= $image_url ?>" alt="<?= $image_alt ?>" class="section_image">
    <div class="container">
        <div class="faq__wrap">
            <h2 class="heading heading-h2 section_title">
                <?= add_em_words($title, array(0)) ?>
            </h2>
            <ul class="faq__wrap__list">
                <?php foreach($faq['questions'] as $key => $item): ?>
                    <li class="faq_item gradient-border <?= $key == 0 ? 'opened' : '' ?>">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M26.7071 20.7076C26.6142 20.8005 26.5039 20.8743 26.3825 20.9246C26.2611 20.9749 26.131 21.0008 25.9996 21.0008C25.8682 21.0008 25.738 20.9749 25.6166 20.9246C25.4952 20.8743 25.385 20.8005 25.2921 20.7076L15.9996 11.4138L6.70708 20.7076C6.51944 20.8952 6.26494 21.0006 5.99958 21.0006C5.73422 21.0006 5.47972 20.8952 5.29208 20.7076C5.10444 20.5199 4.99902 20.2654 4.99902 20.0001C4.99902 19.7347 5.10444 19.4802 5.29208 19.2926L15.2921 9.29255C15.385 9.19958 15.4952 9.12582 15.6166 9.07549C15.738 9.02517 15.8682 8.99927 15.9996 8.99927C16.131 8.99927 16.2611 9.02517 16.3825 9.07549C16.5039 9.12582 16.6142 9.19958 16.7071 9.29255L26.7071 19.2926C26.8001 19.3854 26.8738 19.4957 26.9241 19.6171C26.9745 19.7385 27.0004 19.8686 27.0004 20.0001C27.0004 20.1315 26.9745 20.2616 26.9241 20.383C26.8738 20.5044 26.8001 20.6147 26.7071 20.7076Z" fill="white"/>
                        </svg>
                        <h3 class="heading heading-h3 block-title">
                            <?= $item['question'] ?>
                        </h3>
                        <p class="body block-text">
                            <?= $item['answer'] ?>
                        </p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
