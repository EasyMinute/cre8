<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proacto
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php
$header = get_field('header_options', 'options');
$footer = get_field('footer_options', 'options');
?>

<body <?php  body_class(); ?> >
<?php wp_body_open(); ?>
	
<header id="header" class="header">
	<div class="container">
        <div class="header__wrap">
            <div class="header__logo">
                <?php if (is_front_page()) : ?>
                    <img src="<?= esc_url($header['logo']['url']) ?>" alt="<?= esc_attr($header['logo']['alt']) ?>">
                <?php else : ?>
                    <a href="<?= get_home_url() ?>">
                        <img src="<?= esc_url($header['logo']['url']) ?>" alt="<?= esc_attr($header['logo']['alt']) ?>">
                    </a>
                <?php endif; ?>
            </div>
            <?php wp_nav_menu([
                'menu' => 'header_menu',
                'menu_class' => 'header__menu',
                'container' => 'div',
                'container_class' => 'header__nav',
                'container_id' => 'header_nav',
            ]) ?>
            <div class="header__socials">
		        <?php foreach ($footer['socials'] as $social) : ?>
                    <a href="<?= $social['url'] ?>">
                        <img src="<?= esc_url( $social['icon']['url'] ) ?>" alt="<?= esc_attr( $social['icon']['alt'] ) ?>">
                    </a>
		        <?php endforeach; ?>
            </div>
            <button class="burger mobile button-opener" data-target="header_nav" data-action="toggle" data-self="true">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
	</div>
</header><!-- #masthead -->

