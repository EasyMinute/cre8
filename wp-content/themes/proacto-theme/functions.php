<?php


/**
 * Підключення setup.php
 */
require get_template_directory() . '/functions-parts/setup.php';

/**
 * Підключення віджетів
 */
require get_template_directory() . '/functions-parts/widgets.php';

/**
 * Підключення скриптів та стилів
 */
require get_template_directory() . '/functions-parts/scripts.php';

/**
 * Підключення меню
 */
require get_template_directory() . '/functions-parts/menus.php';

/**
 * Підключення катсомних типів
 */
require get_template_directory() . '/functions-parts/cpt.php';

/**
 * Підключення ACF опцій
 */
require get_template_directory() . '/functions-parts/acf-settings.php';
/**
 * Підключення stuff
 */
require get_template_directory() . '/functions-parts/stuff.php';
/**
 * Підключення template-getters.php
 */
require get_template_directory() . '/functions-parts/template-getters.php';
/**
 * Підключення load-more.php
 */
require get_template_directory() . '/functions-parts/load-more.php';
/**
 * Підключення filter-projects.php
 */
require get_template_directory() . '/functions-parts/projects-filter.php';
/**
 * Підключення acf-fields.php
 */
require get_template_directory() . '/functions-parts/acf-fields.php';



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

?>