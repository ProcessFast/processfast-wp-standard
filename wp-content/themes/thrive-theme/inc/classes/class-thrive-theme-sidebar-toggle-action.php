<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class Thrive_Theme_Sidebar_Toggle_Action
 */
class Thrive_Theme_Sidebar_Toggle_Action extends TCB_Event_Action_Abstract {

	protected $key = 'sidebar_toggle';

	public function getName() {
		return __( 'Open/close sidebar', THEME_DOMAIN );
	}

	/**
	 * Return the javascript functionality that will be called from an action trigger
	 * @return string
	 */
	public function getJsActionCallback() {
		ob_start();
		?>
		function(action, trigger) {
		if( trigger === 'sidebar_toggle' && ThriveTheme.sidebar.isOffScreen() ) {
		ThriveTheme.sidebar._get('off-screen').toggle();
		event && event.preventDefault();
		return false;
		}
		}
		<?php

		return ob_get_clean();
	}

	public function get_options() {
		return [ 'labels' => __( 'Open/close sidebar', THEME_DOMAIN ) ];
	}
}
