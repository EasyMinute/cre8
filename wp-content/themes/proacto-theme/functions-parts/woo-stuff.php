<?php

/**
 * Theme support woocommerce
 */
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'product_grid'          => array(
			'default_rows'    => 3,
			'min_rows'        => 1,
			'max_rows'        => 3,
			'default_columns' => 3,
		),
	) );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//Currency
add_filter('woocommerce_currency_symbol', 'custom_woocommerce_currency_symbol', 10, 2);

function custom_woocommerce_currency_symbol($currency_symbol, $currency) {
	switch ($currency) {
		case 'UAH': // Change 'USD' to the currency code you want to modify
			$currency_symbol = __('грн', 'proacto'); // Change 'US$' to your desired symbol
			break;
	}
	return $currency_symbol;
}



/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
//	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
//	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );




/**
 * SHOP ARCHIVE ACTIONS
 */

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
// Remove the default WooCommerce shop header
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

// Add custom shop header
add_action('woocommerce_archive_description', 'custom_woocommerce_shop_header', 10);

function custom_woocommerce_shop_header() {
	// Load custom template part
	get_template_part('/template-parts/woo/shop-header');
}

//------product card
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);




/**
 * SINGLE PRODUCT
 */
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 20);


add_action('prt_single_prod_head', 'woocommerce_template_single_title', 5);

add_action('prt_single_prod_visuals', 'woocommerce_show_product_images', 10);

add_action('prt_single_prod_add', 'woocommerce_template_single_price', 10);
add_action('prt_single_prod_add', 'woocommerce_template_single_add_to_cart', 20);

add_action('prt_single_prod_description', 'woocommerce_output_product_data_tabs', 10);
//remove_action('', '', 10);