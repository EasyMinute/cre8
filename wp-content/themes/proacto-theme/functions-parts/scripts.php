<?php
//    define('ROOT', $_SERVER['DOCUMENT_ROOT']);
//    define('THEME', get_theme_root());
//    function enqueue_css_files_in_folder() {
//
//        $css_folder = get_template_directory_uri() . '/dist/css/libs/';
//        $css_files = scandir( get_template_directory() . '/dist/css/libs/' );
//
//
//        if ( $css_files ) {
//            foreach ( $css_files as $file ) {
//                if ( pathinfo( $file, PATHINFO_EXTENSION ) === 'css' ) {
//                    $css_path = $css_folder . $file;
//                    wp_enqueue_style( 'custom-style-' . pathinfo( $file, PATHINFO_FILENAME ), $css_path, array(), _S_VERSION );
//                }
//            }
//        }
//    }


	function proacto_style() {
        wp_enqueue_style( 'proacto-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_enqueue_style( 'proacto-slick-style', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css', array(), 1.0, 'all' );
		wp_enqueue_style( 'proacto-slick-theme', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css', array(), 1.0, 'all' );
        wp_enqueue_style( 'proacto-main', get_template_directory_uri() . '/dist/css/main.min.css', array(), 1.0, 'all' );

	}
	function proacto_scripts() {
//		wp_enqueue_script('jquery');


		wp_enqueue_script( 'proacto-main', get_template_directory_uri() . '/dist/js/main.min.js', 'jquery', 1.0, true );
		wp_localize_script('proacto-main', 'proacto_ajax', array(
			'ajax_url' => admin_url('admin-ajax.php')
		));

	}

	//enqueue styles
	add_action( 'wp_enqueue_scripts', 'proacto_style' );
	//enqueue scripts
	add_action( 'wp_enqueue_scripts', 'proacto_scripts' );

?>