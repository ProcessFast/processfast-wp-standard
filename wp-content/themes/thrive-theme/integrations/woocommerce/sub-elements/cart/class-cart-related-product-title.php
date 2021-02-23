<?php

/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-theme
 */

namespace Thrive\Theme\Integrations\WooCommerce\Elements;

use Thrive\Theme\Integrations\WooCommerce;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Cart_Related_Product_Title
 * @package Thrive\Theme\Integrations\WooCommerce\Elements
 */
class Cart_Related_Product_Title extends WooCommerce\Elements\Abstract_Sub_Element {
	/**
	 * @return string
	 */
	public function name() {
		return __( 'Product Title', THEME_DOMAIN );
	}

	/**
	 * @return string
	 */
	public function identifier() {
		return '.cross-sells .product h2';
	}
}

return new Cart_Related_Product_Title( 'wc-cart-related-product-title' );
