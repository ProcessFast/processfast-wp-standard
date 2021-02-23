<?php
/**
 * Thrive Themes - https://thrivethemes.com
 *
 * @package thrive-visual-editor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Silence is golden
}
?>

<div id="tve-image_gallery-component" class="tve-component" data-view="ImageGallery">
	<div class="dropdown-header" data-prop="docked">
		<?php echo __( 'Main Options', 'thrive-cb' ); ?>
		<i></i>
	</div>
	<div class="dropdown-content">
		<div class="tcb-image-count">
			<span class="count-container">
				<span class="count"></span>
				<?php echo __( ' images active', 'thrive-cb' ); ?>
			</span>
			<button class="tve-ghost-green-button click" data-fn="placeholder_action"><?php echo __( 'Edit selection', 'thrive-cb' ); ?></button>
		</div>
		<hr>
		<div class="tve-control full-width" data-view="GalleryType"></div>
		<hr>
		<div class="tve-control" data-view="ShowCaptions"></div>
		<div class="tve-control" data-view="ShowCaptionsInLightbox"></div>
		<div class="tve-control" data-view="Columns"></div>
		<div class="tve-control" data-view="HorizontalSpace"></div>
		<div class="tve-control" data-view="VerticalSpace"></div>

		<div class="tve-control" data-view="ColumnHeight"></div>
		<div class="tve-control" data-view="Gutter"></div>

		<hr>
		<div class="tve-control full-width" data-view="ClickBehavior"></div>
		<div class="tve-control" data-view="CropImages"></div>
		<div class="tve-control full-width" data-view="FullscreenSize"></div>
	</div>
</div>
