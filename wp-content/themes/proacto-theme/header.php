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
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TR85JGHZ');</script>
    <!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<?php
$header = get_field('header_options', 'options');
$footer = get_field('footer_options', 'options');
$button = $header['button'];
?>

<body <?php  body_class(); ?> >
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TR85JGHZ" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
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
            <div class="header__nav" id="header_nav">
                <?php wp_nav_menu([
                    'menu' => 'header_menu',
                    'menu_class' => 'header__menu',
                    'container' => false,
                    'container_class' => false,
                    'container_id' => 'header_nav',
                ]) ?>
	            <?php if (!empty($button['url'])): ?>
                    <a class="button  primary mobile" href="<?= $button['url'] ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM13.125 16.5H12.75V17.25C12.75 17.4489 12.671 17.6397 12.5303 17.7803C12.3897 17.921 12.1989 18 12 18C11.8011 18 11.6103 17.921 11.4697 17.7803C11.329 17.6397 11.25 17.4489 11.25 17.25V16.5H9.75C9.55109 16.5 9.36033 16.421 9.21967 16.2803C9.07902 16.1397 9 15.9489 9 15.75C9 15.5511 9.07902 15.3603 9.21967 15.2197C9.36033 15.079 9.55109 15 9.75 15H13.125C13.4234 15 13.7095 14.8815 13.9205 14.6705C14.1315 14.4595 14.25 14.1734 14.25 13.875C14.25 13.5766 14.1315 13.2905 13.9205 13.0795C13.7095 12.8685 13.4234 12.75 13.125 12.75H10.875C10.1788 12.75 9.51113 12.4734 9.01885 11.9812C8.52657 11.4889 8.25 10.8212 8.25 10.125C8.25 9.42881 8.52657 8.76113 9.01885 8.26884C9.51113 7.77656 10.1788 7.5 10.875 7.5H11.25V6.75C11.25 6.55109 11.329 6.36032 11.4697 6.21967C11.6103 6.07902 11.8011 6 12 6C12.1989 6 12.3897 6.07902 12.5303 6.21967C12.671 6.36032 12.75 6.55109 12.75 6.75V7.5H14.25C14.4489 7.5 14.6397 7.57902 14.7803 7.71967C14.921 7.86032 15 8.05109 15 8.25C15 8.44891 14.921 8.63968 14.7803 8.78033C14.6397 8.92098 14.4489 9 14.25 9H10.875C10.5766 9 10.2905 9.11853 10.0795 9.3295C9.86853 9.54048 9.75 9.82663 9.75 10.125C9.75 10.4234 9.86853 10.7095 10.0795 10.9205C10.2905 11.1315 10.5766 11.25 10.875 11.25H13.125C13.8212 11.25 14.4889 11.5266 14.9812 12.0188C15.4734 12.5111 15.75 13.1788 15.75 13.875C15.75 14.5712 15.4734 15.2389 14.9812 15.7312C14.4889 16.2234 13.8212 16.5 13.125 16.5Z" fill="white"/>
                        </svg>
			            <?= $button['title'] ?>
                    </a>
	            <?php endif; ?>
            </div>
            <div class="header__socials">
		        <?php foreach ($footer['socials'] as $social) : ?>
                    <a  target="_blank" href="<?= $social['url'] ?>">
                        <img src="<?= esc_url( $social['icon']['url'] ) ?>" alt="<?= esc_attr( $social['icon']['alt'] ) ?>">
                    </a>
		        <?php endforeach; ?>
            </div>
            <?php if (!empty($button['url'])): ?>
                <a class="button  primary desktop" href="<?= $button['url'] ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96451 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM13.125 16.5H12.75V17.25C12.75 17.4489 12.671 17.6397 12.5303 17.7803C12.3897 17.921 12.1989 18 12 18C11.8011 18 11.6103 17.921 11.4697 17.7803C11.329 17.6397 11.25 17.4489 11.25 17.25V16.5H9.75C9.55109 16.5 9.36033 16.421 9.21967 16.2803C9.07902 16.1397 9 15.9489 9 15.75C9 15.5511 9.07902 15.3603 9.21967 15.2197C9.36033 15.079 9.55109 15 9.75 15H13.125C13.4234 15 13.7095 14.8815 13.9205 14.6705C14.1315 14.4595 14.25 14.1734 14.25 13.875C14.25 13.5766 14.1315 13.2905 13.9205 13.0795C13.7095 12.8685 13.4234 12.75 13.125 12.75H10.875C10.1788 12.75 9.51113 12.4734 9.01885 11.9812C8.52657 11.4889 8.25 10.8212 8.25 10.125C8.25 9.42881 8.52657 8.76113 9.01885 8.26884C9.51113 7.77656 10.1788 7.5 10.875 7.5H11.25V6.75C11.25 6.55109 11.329 6.36032 11.4697 6.21967C11.6103 6.07902 11.8011 6 12 6C12.1989 6 12.3897 6.07902 12.5303 6.21967C12.671 6.36032 12.75 6.55109 12.75 6.75V7.5H14.25C14.4489 7.5 14.6397 7.57902 14.7803 7.71967C14.921 7.86032 15 8.05109 15 8.25C15 8.44891 14.921 8.63968 14.7803 8.78033C14.6397 8.92098 14.4489 9 14.25 9H10.875C10.5766 9 10.2905 9.11853 10.0795 9.3295C9.86853 9.54048 9.75 9.82663 9.75 10.125C9.75 10.4234 9.86853 10.7095 10.0795 10.9205C10.2905 11.1315 10.5766 11.25 10.875 11.25H13.125C13.8212 11.25 14.4889 11.5266 14.9812 12.0188C15.4734 12.5111 15.75 13.1788 15.75 13.875C15.75 14.5712 15.4734 15.2389 14.9812 15.7312C14.4889 16.2234 13.8212 16.5 13.125 16.5Z" fill="white"/>
                    </svg>
                    <?= $button['title'] ?>
                </a>
            <?php endif; ?>
            <button class="burger mobile button-opener" data-target="header_nav" data-action="toggle" data-self="true">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
	</div>
</header><!-- #masthead -->

