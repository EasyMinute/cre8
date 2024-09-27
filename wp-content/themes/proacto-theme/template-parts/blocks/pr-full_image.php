<?php
//main class name for block
$className = 'full_image';
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

$full_image = get_field('full_image');
$img_url = esc_url($full_image['image']['url']);
$img_alt = esc_url($full_image['image']['alt']);
$color = $full_image['overlay'];
?>

<section class="<?= $className ?>">
	<img src="<?= $img_url ?>" alt="<?= $img_alt?> ">
    <?php if ($full_image['add_button'] && !empty($full_image['button'])): ?>
        <div class="full_image__overlay" style="background: linear-gradient(0deg, <?= $color ?> 15.07%, <?= $color ?>00 83.41%);">
            <div class="mobile bg" style="background-color: <?= $color ?>;"></div>
            <a href="<?= $full_image['button']['url'] ?>" class="button button-m project-play">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.875 8.99986C16.8755 9.19085 16.8265 9.37871 16.7329 9.54516C16.6392 9.71162 16.5041 9.85101 16.3406 9.94978L6.21 16.1471C6.0392 16.2517 5.84358 16.3088 5.64334 16.3125C5.44309 16.3162 5.24549 16.2664 5.07094 16.1682C4.89805 16.0716 4.75402 15.9306 4.65368 15.7598C4.55333 15.589 4.50029 15.3946 4.5 15.1965V2.80322C4.50029 2.60514 4.55333 2.41071 4.65368 2.23993C4.75402 2.06914 4.89805 1.92817 5.07094 1.8315C5.24549 1.73331 5.44309 1.6835 5.64334 1.6872C5.84358 1.69091 6.0392 1.74801 6.21 1.8526L16.3406 8.04994C16.5041 8.14871 16.6392 8.2881 16.7329 8.45456C16.8265 8.62102 16.8755 8.80887 16.875 8.99986Z" fill="#093238"/>
                </svg>
                <?= $full_image['button']['title'] ?>
            </a>
        </div>
    <?php endif; ?>
</section>