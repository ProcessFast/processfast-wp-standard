<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-visual-editor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden!
}

/**
 * Class TCB_Image_Gallery_Element
 */
class TCB_Image_Gallery_Element extends TCB_Element_Abstract {

	/**
	 * Name of the element
	 *
	 * @return string
	 */
	public function name() {
		return __( 'Image Gallery', 'thrive-cb' );
	}

	/**
	 * Get element alternate
	 *
	 * @return string
	 */
	public function alternate() {
		return 'media';
	}


	/**
	 * Return icon class needed for display in menu
	 *
	 * @return string
	 */
	public function icon() {
		return 'image-gallery';
	}

	/**
	 * Element identifier
	 *
	 * @return string
	 */
	public function identifier() {
		return '.tcb-image-gallery';
	}

	/**
	 * This element is not a placeholder
	 *
	 * @return bool|true
	 */
	public function is_placeholder() {
		return false;
	}

	/**
	 * HTML layout of the element for when it's dragged in the canvas
	 *
	 * @return string
	 */
	protected function html() {
		return $this->html_placeholder();
	}

	/**
	 * @param null $title
	 *
	 * @return bool|string|null
	 */
	public function html_placeholder( $title = null ) {
		return tcb_template( 'elements/image-gallery', null, true );
	}

	/**
	 * Hide this.
	 *
	 * @return bool
	 */
	public function hide() {
		return true;
	}

	/**
	 * Component and control config
	 *
	 * @return array
	 */
	public function own_components() {
		$components = array(
			'image_gallery' => array(
				'config' => array(
					'GalleryType'            => array(
						'config'  => array(
							'name'          => __( 'Gallery type', 'thrive-cb' ),
							'large_buttons' => true,
							'buttons'       => array(
								array(
									'value'   => 'grid',
									'data'    => array(
										'tooltip'  => __( 'Grid', 'thrive-cb' ),
										'position' => 'top',
									),
									'icon'    => 'gallery-grid',
									'default' => true,
								),
								array(
									'value' => 'verticalMasonry',
									'data'  => array(
										'tooltip'  => __( 'Vertical Masonry', 'thrive-cb' ),
										'position' => 'top',
										'width'    => '100%',
									),
									'icon'  => 'gallery-vertical-masonry',
								),
								array(
									'value' => 'horizontalMasonry',
									'data'  => array(
										'tooltip'  => __( 'Horizontal Masonry', 'thrive-cb' ),
										'position' => 'top',
										'width'    => '100%',
									),
									'icon'  => 'gallery-horizontal-masonry',
								),
							),
						),
						'extends' => 'ButtonGroup',
					),
					'ShowCaptions'           => array(
						'config'  => array(
							'name'    => '',
							'label'   => __( 'Show captions', 'thrive-cb' ),
							'default' => false,
						),
						'extends' => 'Switch',
					),
					'ShowCaptionsInLightbox' => array(
						'config'  => array(
							'name'    => '',
							'label'   => __( 'Show captions on lightbox', 'thrive-cb' ),
							'default' => false,
						),
						'extends' => 'Switch',
					),
					'Columns'                => array(
						'config'  => array(
							'default' => '3',
							'min'     => '1',
							'max'     => '10',
							'label'   => __( 'Images per row', 'thrive-cb' ),
							'um'      => array( '' ),
						),
						'extends' => 'Slider',
					),
					'VerticalSpace'          => array(
						'config'  => array(
							'min'   => '0',
							'max'   => '240',
							'label' => __( 'Vertical space', 'thrive-cb' ),
							'um'    => array( 'px' ),
						),
						'extends' => 'Slider',
					),
					'HorizontalSpace'        => array(
						'config'  => array(
							'min'   => '0',
							'max'   => '240',
							'label' => __( 'Horizontal space', 'thrive-cb' ),
							'um'    => array( 'px' ),
						),
						'extends' => 'Slider',
					),
					'ColumnHeight'           => array(
						'config'  => array(
							'min'   => '1',
							'max'   => '800',
							'label' => __( 'Column Height', 'thrive-cb' ),
							'um'    => array( 'px' ),
						),
						'extends' => 'Slider',
					),
					'Gutter'                 => array(
						'config'  => array(
							'min'   => '0',
							'max'   => '240',
							'label' => __( 'Gutter', 'thrive-cb' ),
							'um'    => array( 'px' ),
						),
						'extends' => 'Slider',
					),
					'ClickBehavior'          => array(
						'config'  => array(
							'name'    => __( 'Click behavior', 'thrive-cb' ),
							'options' => array(
								array(
									'value' => 'fullscreen',
									'name'  => 'Open fullscreen lightbox',
								),
								array(
									'value' => 'none',
									'name'  => 'None',
								),
							),
						),
						'extends' => 'Select',
					),

					'ThumbnailSize' => array(
						'config'  => array(
							'name'    => __( 'Thumbnail size', 'thrive-cb' ),
							'options' => array(
								array(
									'value' => 'thumbnail',
									'name'  => 'Small',
								),
								array(
									'value' => 'medium',
									'name'  => 'Medium',
								),
								array(
									'value' => 'large',
									'name'  => 'Large',
								),
								array(
									'value' => 'full',
									'name'  => 'Original',
								),
							),
						),
						'extends' => 'Select',
					),
					'CropImages'           => array(
						'config'  => array(
							'name'    => '',
							'label'   => __( 'Crop images to fit', 'thrive-cb' ),
							'default' => false,
						),
						'extends' => 'Switch',
					),
					'FullscreenSize' => array(
						'config'  => array(
							'name'    => __( 'Full screen image size', 'thrive-cb' ),
							'options' => array(
								array(
									'value' => 'thumbnail',
									'name'  => 'Small',
								),
								array(
									'value' => 'medium',
									'name'  => 'Medium',
								),
								array(
									'value' => 'large',
									'name'  => 'Large',
								),
								array(
									'value' => 'full',
									'name'  => 'Original',
								),
							),
						),
						'extends' => 'Select',
					),
				),
			),
		);

		return array_merge( $components, parent::own_components() );
	}

	/**
	 * Element category that will be displayed in the sidebar
	 *
	 * @return string
	 */
	public function category() {
		return self::get_thrive_basic_label();
	}
}
