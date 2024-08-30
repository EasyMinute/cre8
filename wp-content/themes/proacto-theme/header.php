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

<?php $header = get_field('header_options', 'options') ?>

<body <?php  body_class(); ?> >
<?php wp_body_open(); ?>
	
<header id="header" class="header">
	<div class="container">
        <div class="header__wrap">
            <a href="<?= get_home_url()?>" class="header__logo">
                <img src="<?= esc_url( $header['logo']['url'] ) ?>"
                 alt="<?= esc_attr( $header['logo']['alt'] ) ?>" class="header__logo">
            </a>
            <?php wp_nav_menu([
                'menu' => 'Header',
                'menu_class' => 'header_menu',
                'container' => 'div',
                'container_class' => 'header_nav'
            ]) ?>
            <div class="header_service">
                <div class="header_buttons">
                    <a href="<?= $header['shop_button']['url'] ?>" class="button button-m primary">
	                    <?= $header['shop_button']['title'] ?>
                    </a>
                </div>
            </div>
        </div>
	</div>
</header><!-- #masthead -->

