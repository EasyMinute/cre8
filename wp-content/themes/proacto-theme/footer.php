<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proacto
 */


$footer = get_field('footer_options', 'options')
?>
	<footer id="colophon" class="site-footer">
		<div class="container">
            <div class="footer">
                <div class="footer__main">
                    <img src="<?= esc_url( $footer['logo']['url'] ) ?>" alt="<?= esc_attr($footer['logo']['alt']) ?>" class="footer_logo">
                    <?php if(!empty($footer['email'])): ?>
                        <a href="mailto:<?= $footer['email'] ?>" class="body footer_email">
                            <?= $footer['email'] ?>
                        </a>
                    <?php endif; ?>
                </div>
	            <?php wp_nav_menu([
		            'menu' => 'footer_menu',
		            'menu_class' => 'footer_menu',
		            'container' => 'div',
		            'container_class' => 'footer__nav',
		            'container_id' => 'footer_nav',
	            ]) ?>
                <div class="footer__divider desktop"></div>
                <div class="footer__copyright">
                    <p class="body">
                        <?= $footer['copyright'] ?>
                    </p>
                </div>
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
	</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
