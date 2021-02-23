<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

use WP_Rocket\Admin\Options;
use WP_Rocket\Admin\Options_Data;

/**
 * Class Thrive_Wp_Rocket
 */
class Thrive_Wp_Rocket implements Thrive_Plugin_Contract {
	/**
	 * Use general singleton methods
	 */
	use Thrive_Singleton;

	/**
	 * Directory plugin
	 */
	const DIR = 'wp-rocket';

	/**
	 * Plugins Main File
	 */
	const FILE = 'wp-rocket/wp-rocket.php';

	/**
	 * Our default settings for total cache
	 */
	const THRIVE_RECOMMENDED
		= [
			'cache_logged_user'      => 0,
			'minify_css'             => 1,
			'minify_concatenate_css' => 1,
			'async_css'              => 1,
			'minify_js'              => 1,
			'minify_concatenate_js'  => 1,
			'defer_all_js'           => 1,
			'exclude_css'            => [
				'wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen.css',
			],
			'exclude_js'             => [
				'wp-includes/js/jquery/jquery.js',
				'wp-includes/js/jquery/jquery.min.js',
				'wp-content/plugins/thrive-visual-editor/editor/js/dist/frontend.min.js',
			],
			'exclude_defer_js'       => [
				'wp-includes/js/jquery/jquery.js',
				'wp-includes/js/jquery/jquery.min.js',
				'wp-content/plugins/thrive-visual-editor/editor/js/dist/frontend.min.js',
			],
		];

	/**
	 * Check if the plugin has the configuration suggested by thrive
	 *
	 * @return bool
	 */
	public function is_configured() {

		if ( ! is_plugin_active( static::FILE ) ) {
			return false;
		}

		$options_api = new Options( 'wp_rocket_' );
		$options     = new Options_Data( $options_api->get( 'settings', [] ) );
		$configured  = true;

		foreach ( static::THRIVE_RECOMMENDED as $key => $value ) {
			if ( $options->get( $key ) !== $value ) {
				$configured = false;
			}
		}

		return $configured;
	}

	/**
	 * Update WP Rocket settings
	 *
	 * @param array $data
	 * @param bool  $keep_existing - whether or not to keep the existing settings for the plugin
	 *
	 * @return bool
	 */
	public function update_settings( $data = [], $keep_existing = false ) {
		$options_api = new Options( 'wp_rocket_' );
		$options     = new Options_Data( $options_api->get( 'settings', [] ) );

		$options->set_values( static::THRIVE_RECOMMENDED );
		$options_api->set( 'settings', $options->get_options() );

		return true;
	}

	/**
	 * Return general information about the plugin
	 *
	 * @return array
	 */
	public function get_info() {
		return [
			'tag'        => 'wp-rocket',
			'slug'       => 'wp-rocket',
			'name'       => 'WP Rocket',
			'file'       => static::FILE,
			'installed'  => is_dir( WP_PLUGIN_DIR . '/' . static::DIR ),
			'active'     => is_plugin_active( static::FILE ),
			'configured' => $this->is_configured(),
			'premium'    => true,
			'redirect'   => 'https://help.thrivethemes.com/en/articles/4741848-setting-up-and-using-wp-rocket-with-thrive-theme-builder',
		];
	}
}


/**
 * Return Thrive_Total_Cache instance
 *
 * @return Thrive_Wp_Rocket
 */
function thrive_wp_rocket() {
	return Thrive_Wp_Rocket::instance();
}
