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
 * Class Thrive_Author_Follow_Element
 */
class Thrive_Author_Follow_Element extends TCB_Social_Element {

	/**
	 * Element name
	 *
	 * @return string
	 */
	public function name() {
		return __( 'Author Social Links', THEME_DOMAIN );
	}

	/**
	 * Return icon class needed for display in menu
	 *
	 * @return string
	 */
	public function icon() {
		return 'author-follow';
	}

	/**
	 * Element identifier
	 *
	 * @return string
	 */
	public function identifier() {
		return '.thrv_author_follow';
	}

	/**
	 * Component and control config
	 *
	 * @return array
	 */
	public function own_components() {
		$components = parent::own_components();

		$components['styles-templates'] = [ 'hidden' => true ];

		$components['thrive_author_follow'] = $components['social'];

		$components['thrive_author_follow']['config']['preview']['config']['settings_icon'] = false;

		$components['thrive_author_follow']['config']['stylePicker']['config']['items'] = array(
			'tve_style_1' => 'Style 1',
			'tve_style_2' => 'Style 1',
			'tve_style_3' => 'Style 3',
			'tve_style_4' => 'Style 4',
			'tve_style_5' => 'Style 5',
		);

		$components['thrive_author_follow']['disabled_controls'] = [ 'type', 'has_custom_url', 'custom_url', 'counts', 'total_share', 'CustomBranding', 'CssVarChanger' ];
		unset( $components['social'] );

		return $components;
	}

	/**
	 * @return string
	 */
	public function category() {
		return TCB_Post_List::elements_group_label();
	}
}

return new Thrive_Author_Follow_Element( 'thrive_author_follow' );

